import { Octokit } from "https://cdn.skypack.dev/@octokit/rest";

// HTTP client for REST requests
const octokit = new Octokit({
  userAgent: "heydavid.kim v1.0"
});

// Make a REST request to convert Markdown into HTML
(async () => {
  const { data: req } = await octokit.request("POST /markdown", {
    text: "helloworld\n- text",

  })
  console.log(req)
  document.getElementById("demo").innerHTML = req;
})()