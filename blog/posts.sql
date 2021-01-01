CREATE TABLE IF NOT EXISTS posts (
  id          serial       PRIMARY KEY, 
  author      text         NOT NULL, 
  title       text         NOT NULL, 
  time_cr     timestamptz  NOT NULL DEFAULT CURRENT_TIMESTAMP(0), 
  time_mod    timestamptz,
  content     text         NOT NULL
);