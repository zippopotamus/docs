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
        if (err) {
            console.error(stderr);
            process.exit(1);
        }

        console.log("Jigsaw output:", stdout);

        isRunning = false;

        if (cb !== undefined) {
            cb();
        }
    });
}

