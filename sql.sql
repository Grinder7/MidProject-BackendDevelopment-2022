CREATE DATABASE IF NOT EXISTS mid_project;

USE mid_project;

CREATE TABLE IF NOT EXISTS account(
    uid INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (uid)
);

CREATE TABLE IF NOT EXISTS tasks(
    tid INT NOT NULL AUTO_INCREMENT,
    task_name VARCHAR(255) NOT NULL,
    deadline DATE NOT NULL,
    status INT NOT NULL,
    uid INT NOT NULL,
    PRIMARY KEY (tid),
    FOREIGN KEY (uid) REFERENCES account(uid)
);