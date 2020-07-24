USE movie;

CREATE TABLE movies(
    mID INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    producer VARCHAR(255),
    publish_date DATE,
    price FLOAT
);