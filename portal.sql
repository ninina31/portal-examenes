CREATE TABLE Account(
  id INT AUTO_INCREMENT NOT NULL,
  name varchar(128) NOT NULL,
  email varchar(32),
  created_at TIMESTAMP DEFAULT NOW(),
  PRIMARY KEY (id)
);

CREATE TABLE Manager(
  id INT AUTO_INCREMENT NOT NULL,
  name VARCHAR(32),
  last_name VARCHAR(32),
  apikey CHAR(128) NOT NULL,
  email varchar(32) NOT NULL,
  password VARCHAR(255) NOT NULL,
  id_account INT NOT NULL,
  created_at TIMESTAMP DEFAULT NOW(),
  PRIMARY KEY (id),
  FOREIGN KEY (id_account) REFERENCES Account(id)
);

CREATE TABLE Test(
  id_test VARCHAR(32) NOT NULL,
  name VARCHAR(128) NOT NULL,
  instructions VARCHAR(512),
  duration TIME NOT NULL,
  extra_time TIME NOT NULL,
  id_manager INT NOT NULL,
  is_active BIT NOT NULL DEFAULT 0,
  is_autocorrect BIT NOT NULL DEFAULT 0,
  created_at TIMESTAMP DEFAULT NOW(),
  PRIMARY KEY (id_test),
  FOREIGN KEY (id_manager) REFERENCES Manager(id)
);

CREATE TABLE Reviewer(
  id INT AUTO_INCREMENT NOT NULL,
  name VARCHAR(32),
  last_name VARCHAR(32),
  email VARCHAR(32) NOT NULL,
  password VARCHAR(255) NOT NULL,
  id_account INT NOT NULL,
  created_at TIMESTAMP DEFAULT NOW(),
  PRIMARY KEY (id),
  FOREIGN KEY (id_account) REFERENCES Account(id)
);

CREATE TABLE Reviewer_Test(
  id INT AUTO_INCREMENT NOT NULL,
  id_reviewer INT NOT NULL,
  id_test VARCHAR(32) NOT NULL,
  created_at TIMESTAMP DEFAULT NOW(),
  PRIMARY KEY (id),
  FOREIGN KEY (id_reviewer) REFERENCES Reviewer(id),
  FOREIGN KEY (id_test) REFERENCES Test(id_test)
);

CREATE TABLE Question_Type(
  id INT AUTO_INCREMENT NOT NULL,
  type ENUM('abierta_nolimit', 'abierta_limit', 'seleccion_simple', 'seleccion_multiple') NOT NULL,
  is_autocorrect BIT NOT NULL,
  created_at TIMESTAMP DEFAULT NOW(),
  PRIMARY KEY (id)
);

CREATE TABLE Question(
  id INT AUTO_INCREMENT NOT NULL,
  id_type INT NOT NULL,
  id_test VARCHAR(32) NOT NULL,
  description VARCHAR(256) NOT NULL,
  score DOUBLE(5,2) NOT NULL,
  created_at TIMESTAMP DEFAULT NOW(),
  PRIMARY KEY (id),
  FOREIGN KEY (id_type) REFERENCES Question_Type(id),
  FOREIGN KEY (id_test) REFERENCES Test(id_test)
);

CREATE TABLE Proposed_Answer(
  id INT AUTO_INCREMENT NOT NULL,
  id_question INT NOT NULL,
  answer VARCHAR(128) NOT NULL,
  file BLOB,
  created_at TIMESTAMP DEFAULT NOW(),
  PRIMARY KEY (id),
  FOREIGN KEY (id_question) REFERENCES Question(id)
);

CREATE TABLE Correct_Answer(
  id INT AUTO_INCREMENT NOT NULL,
  id_question INT NOT NULL,
  id_proposed_answer INT NOT NULL,
  score DOUBLE(5,2) NOT NULL,
  created_at TIMESTAMP DEFAULT NOW(),
  PRIMARY KEY (id),
  FOREIGN KEY (id_question) REFERENCES Question(id),
  FOREIGN KEY (id_proposed_answer) REFERENCES Proposed_Answer(id)
);

CREATE TABLE Candidate(
  id INT AUTO_INCREMENT NOT NULL,
  username VARCHAR(64) NOT NULL,
  password VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT NOW(),
  PRIMARY KEY (id)
);

CREATE TABLE Candidate_Test(
  id INT AUTO_INCREMENT NOT NULL,
  id_test varchar(32) NOT NULL,
  id_candidate INT NOT NULL,
  score DOUBLE(5,2) NOT NULL,
  expiration_date DATETIME NOT NULL,
  submitted_date DATETIME NOT NULL,
  created_at TIMESTAMP DEFAULT NOW(),
  PRIMARY KEY (id),
  FOREIGN KEY (id_test) REFERENCES Test(id_test),
  FOREIGN KEY (id_candidate) REFERENCES Candidate(id)
);

CREATE TABLE Candidate_Question_Answer(
  id INT AUTO_INCREMENT NOT NULL,
  id_question INT NOT NULL,
  id_candidate INT NOT NULL,
  id_proposed_answer INT NOT NULL,
  file BLOB,
  score DOUBLE(5,2) NOT NULL,
  created_at TIMESTAMP DEFAULT NOW(),
  PRIMARY KEY (id),
  FOREIGN KEY (id_question) REFERENCES Question(id),
  FOREIGN KEY (id_candidate) REFERENCES Candidate(id),
  FOREIGN KEY (id_proposed_answer) REFERENCES Proposed_Answer(id)
);
