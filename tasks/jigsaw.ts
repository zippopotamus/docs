import { exec } from "child_process";
import { resolve } from "path";

let isRunning = false;

export default function BuildJigsaw(env: "local" | "production", cb?: CallableFunction) {
    if (isRunning === true) {
        console.log("prevented re-running jigsaw")
    }
    isRunning = true;
    const jigsawBin = resolve("./vendor/bin/jigsaw");
    exec(`${jigsawBin} build ${env}`, (err, stdout, stderr) => {
        function log(message: string, err: Error|null) {
            return err ? console.error : console.log;
        }

        log(stdout ?? stderr, err)

        if (err) {
            // process.exit(1);
        }

        isRunning = false;

        if (cb !== undefined) {
            cb();
        }
    });
}

