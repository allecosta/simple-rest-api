CREATE TABLE  users (
	id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(60) NOT NULL DEFAULT '',
    email VARCHAR(60) NOT NULL DEFAULT '',
    user_status INT NOT NULL DEFAULT '0'
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO users (username, email, user_status) VALUES ("Alex", "alex@hostmail.com", 1);
INSERT INTO users (username, email, user_status) VALUES ("Deia", "deia@hostmail.com", 0);
INSERT INTO users (username, email, user_status) VALUES ("Poul", "poul@hostmail.com", 1);
INSERT INTO users (username, email, user_status) VALUES ("Marks", "marks@hostmail.com", 1);
INSERT INTO users (username, email, user_status) VALUES ("Kuan", "kuan@hostmail.com", 0);

