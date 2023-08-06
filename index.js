const http = require("http");
const axios = require("axios");

const corsWhitelist = ["https://mrepol742.github.io", "http://0.0.0.0:8000"];

const server = http.createServer(getRoutes());

server.listen(8000, function () {
    console.log("Serving HTTP on 0.0.0.0 port 8000 (http://0.0.0.0:8000/) ...");
});

function getRoutes() {
    return async function (req, res) {
        let ress = req.url;
        let url = ress.split("?")[0];
        console.log(req.method + " " + req.headers.origin + " " + url);
        if (req.method != "POST" || !(corsWhitelist.indexOf(req.headers.origin) !== -1)) {
            res.writeHead(301, {
                Location: "https://mrepol742.github.io/unauthorized",
            });
            res.end();
        } else {
            let body = "";
            req.on("data", (chunk) => {
                body += chunk;
            });
            req.on("end", () => {
                req.body = JSON.parse(body);
                const lang = req.body.lang;
                const code = req.body.code;

                res.end(lang + " " + code);
            });
        }
    };
}

async function main() {
    let res = await axios.post("http://0.0.0.0:8000", {
        lang: "test",
        code: "test",
    });
}

main();
