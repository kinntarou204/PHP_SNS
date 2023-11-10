CREATE TABLE tweets (
  id bigint(20) Primary KEY AUTO_INCREMENT,
  message text NOT NULL,
  user_id bigint(20) NOT NULL,
  image_path text DEFAULT NULL,
  created_at timestamp NULL DEFAULT current_timestamp(),
  updated_at timestamp NULL DEFAULT current_timestamp()
);

CREATE TABLE users (
    id bigint PRIMARY KEY AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    email varchar(255) UNIQUE NOT NULL,
    email_verified_at datetime NULL DEFAULT NULL,
    password varchar(255) NOT NULL,
    remember_token varchar(100) DEFAULT NULL,
    created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at datetime NULL DEFAULT NULL
);

CREATE TABLE likes (
  id bigint(20) Primary KEY AUTO_INCREMENT,
  user_id bigint(20) NOT NULL,
  tweet_id bigint(20) NOT NULL,
  created_at timestamp NULL DEFAULT current_timestamp(),
  updated_at timestamp NULL DEFAULT current_timestamp()
);

ALTER TABLE users ADD UNIQUE KEY users_email_unique (email);
ALTER TABLE likes ADD UNIQUE KEY likes_tweet_user_unique (tweet_id, user_id);

ALTER TABLE likes ADD CONSTRAINT likes_user_id_fk FOREIGN KEY (user_id) 
  REFERENCES users(id) 
  ON DELETE CASCADE 
  ON UPDATE CASCADE;

ALTER TABLE likes ADD CONSTRAINT likes_tweet_id_fk FOREIGN KEY (tweet_id) 
  REFERENCES tweets(id) 
  ON DELETE CASCADE 
  ON UPDATE CASCADE;