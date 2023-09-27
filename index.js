/*
 *
 * Copyright (c) 2023 Melvin Jones Repol (mrepol742.github.io). All Rights Reserved.
 *
 * License under the GNU GENERAL PUBLIC LICENSE, version 3.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://github.com/mrepol742/run/blob/master/LICENSE
 *
 * Unless required by the applicable law or agreed in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

const http = require("http");
const axios = require("axios");
const vm = require('node:vm');

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
        /*
        if (req.method != "POST" || !(corsWhitelist.indexOf(req.headers.origin) !== -1)) {
            res.writeHead(301, {
                Location: "https://mrepol742.github.io/unauthorized",
            });
            res.end();
        } else {
          */
            let body = "";
            req.on("data", (chunk) => {
                body += chunk;
            });
            req.on("end", () => {
                req.body = JSON.parse(body);
                if (req.body === undefined) {
                  sendResponse(res, "lang & code must be define.");
                }
                const lang = req.body.lang;
                const code = req.body.code;

                if (lang === undefined) {
                  sendResponse(res, "lang cant be empty.");
                }
                if (code === undefined) {
                  sendResponse(res, "code cant be empty.");
                }

                

            });
       // }
    };
}

function execute(lang, code) {
  global.globalVar = 0;

  const script = new vm.Script('globalVar += 1', { filename: 'myfile.vm' });
  

    script.runInThisContext();
  
  console.log(globalVar);
}

functio sendResponse(res, message) {
  //res.setHeader("Access-Control-Allow-Origin", req.headers.origin);
  res.setHeader("Content-Type", "text/html");
  res.writeHead(200);
  res.end(message);
}

async function main() {
    let res = await axios.post("http://0.0.0.0:8000", {
        lang: "test",
        code: "test",
    });
    console.log(res.data)
}

main();
