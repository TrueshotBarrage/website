// TODO: Comment this
const parse = async function (path, csv = "") {
  let file;
  // If midi csv is directly provided
  if (csv !== "") {
    file = csv;
  }
  // If the path to the midi csv file is provided
  else {
    file = await d3.text(path);
  }
  let header = "track,time,type,channel,note,velocity";
  file = header + "\n" + file;

  let music = d3.csvParse(file);
  for (let i = 0; i < music.length; i++) {
    Object.keys(music[i]).forEach(k => {
      music[i][k] = music[i][k].trim();
      if (music[i][k] == Number(music[i][k])) {
        music[i][k] = Number(music[i][k]);
      }
    });
  }
  return music;
}
export { parse as default };