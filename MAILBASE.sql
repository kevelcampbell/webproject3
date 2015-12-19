CREATE TABLE IF NOT EXISTS 'user'( 
  "id" INT NOT NULL AUTO_INCREMENT,
  "firstName" VARCHAR(50) NOT NULL, 
  "lastName" VARCHAR(50) NOT NULL, 
  "password" TEXT NOT NULL, 
  "userName" VARCHAR(100), 
  PRIMARY KEY ( id )); 


CREATE TABLE IF NOT EXISTS 'message'(
  "id" INT NOT NULL AUTO_INCREMENT,
  "body" TEXT NOT NULL,
  "subject" VARCHAR(500) NOT NULL,
  "user_id" INT NOT NULL,
  "recipient_ids" INT NOT NULL,
  PRIMARY KEY ( id )); 


CREATE TABLE IF NOT EXISTS "message_read"(
  "id" INT NOT NULL AUTO_INCREMENT,
  "message_id" INT NOT NULL,
  "reader_id" INT NOT NULL,
  "date" DATE NOT NULL,
  PRIMARY KEY ( id ));
