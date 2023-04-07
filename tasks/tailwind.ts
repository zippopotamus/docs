import {resolve} from "path";
import {exec, spawn} from "child_process";

const TwBin = resolve("./node_modules/.bin/tailwindcss");

export function RunTailwind() {
    const input = resolve("./source/_assets/css/main.css");
    const output = resolve("./source") + "/assets/main.css";

    exec( TwBin + ` -i ${input} -o ${output} -m`, (err, stdout, stderr) => {
        function log(message: string, err: Error|null) {
            return err ? console.error : console.log;
        }

        log(stdout ?? stderr, err)
    });
}


export function WatchTailwind() {
    const input = resolve("./source/_assets/css/main.css");
    const output = resolve("./build_local") + "/assets/main.css";

    let proc = spawn(TwBin, ["-i", input, "-o", output, '-w']);

    proc.stderr.on("data", (err) => {
        console.error(err.toString());
    });

    proc.stdout.on("data", (out) => {
        console.log(out.toString());
    });

    proc.on("close", () => {
        console.log("Tailwind stopped");
    });
}
