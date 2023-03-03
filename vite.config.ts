import {defineConfig, Plugin} from "vite";
const { exec } = require("child_process");
const path = require('path');

export default defineConfig(({ command, mode, ssrBuild }) => {

    let buildEnv;
    let root;
    switch (mode) {
        case "development":
        case "dev":
        case "local":
            buildEnv = "local"
        break;
        default:
            buildEnv = "production"
    }

    root = `./build_${buildEnv}`

    return {
        root,
        server: {
            watch: {
                ignored: [
                    "**/_tmp/**/*",
                ],
                disableGlobbing: false,
            }
        },
        plugins: [
            Jigsaw(buildEnv, [
                "source/**/*"
            ]),
        ]
    }
})

function runJigsaw(env, logger = undefined, ws = undefined) {
    return (path = null) => {
        if (path !== null && path.indexOf(`build_${env}`) > -1) {
            return;
        }

        const bin = './vendor/bin/jigsaw';

        exec(`${bin} build ${env !== "production" ? "-c ": ""}${env}`, (err, stdout, stderr) => {
            if (err) {
                if (logger !== undefined) {
                    logger.error("Unable to build static pages: \n\n" + stdout + "\n" + stderr);
                    return;
                }

                throw new Error("Unable to build static pages: \n\n" + stdout + "\n" + stderr)
            }
            if (ws !== undefined) {
                setTimeout(() => ws.send({ type: 'full-reload', path: '*'}), 0);
            }
        });
    }
}

const Jigsaw: (env: string, views: Array<string>) => Plugin = ((env, views) => ({

    name: "jigsaw",

    config: () => ({ server: {watch: {disableGlobbing: false}}}),

    resolveId(id) {
        if (id.endsWith("build_production/index.html")) {
            return id;
        }

        return null;
    },

    load(id) {
        if (id.endsWith("build_production/index.html")) {
            return id;
        }

        return null;
    },

    buildStart() {

    },

    buildEnd() {
        runJigsaw(env, ({
            error: (error) => this.error(error)
        }))()
    },

    configureServer({watcher, ws, middlewares, config: { logger }}) {

        const jigsaw = runJigsaw(env, logger, ws);

        jigsaw();

        watcher.add(views);
        watcher.on("add", jigsaw);
        watcher.on("change", jigsaw);


        middlewares.use( (req, res, next) => {
            if (req.url.indexOf(".") > -1 || req.url.indexOf("@") > -1) {
                next();
                return;
            }

            if (! req.url.endsWith("/")) {
                req.url += "/"
            }

            req.url += "index.html";

            next();
        });
    }
}));