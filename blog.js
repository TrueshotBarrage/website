import { Octokit } from "https://cdn.skypack.dev/@octokit/rest";

// HTTP client for REST requests
const octokit = new Octokit({
  userAgent: "heydavid.kim v1.0",
});

// Make a REST request to convert Markdown into HTML
let markdownToHTML = async function (md) {
  const { data: resp } = await octokit.request("POST /markdown", {
    text: md,
  });
  console.log(resp);
  document.getElementById("demo").innerHTML = resp;
};
