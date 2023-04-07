const bs = await import("browser-sync");
import RunJigsaw from "./jigsaw.js";
import { RunTailwind, WatchTailwind } from "./tailwind.js";

RunJigsaw("local", () => {
    WatchTailwind();
});

bs.init({
    // open: false,
    files: ["./*.php", "./source/**/*", "build_local/**/*"],
    server: {
        baseDir: "build_local",
    },
    watch: true,
    watchOptions: {
        ignoreInitial: true,
        ignored: "*_tmp*"
    },
}, (err, b) => {
    b.emitter.on("file:changed", ({ path }) => {
        if (path.indexOf("php") > -1) {
            RunJigsaw("local", () => {
                RunTailwind();
            });
        }

        if (path.indexOf("css") > -1) {
            bs.reload();
        }
    })
});