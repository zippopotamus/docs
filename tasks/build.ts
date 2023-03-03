import { RunTailwind } from "./tailwind.js";
import RunJigsaw from "./jigsaw.js";


console.log("running tailwind");
RunTailwind(function() {
    console.log("running jigsaw");
    RunJigsaw("production");
});