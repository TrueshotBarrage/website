CREATE TABLE IF NOT EXISTS posts (
  id          serial PRIMARY KEY, 
  author      text   NOT NULL, 
  title       text   NOT NULL, 
  date_cr     date   NOT NULL DEFAULT CURRENT_DATE, 
  date_mod    date,
  content     text   NOT NULL
);