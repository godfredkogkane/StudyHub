-- Create the database
DROP DATABASE IF EXISTS studyhub;
CREATE DATABASE studyhub;

-- Use the created database
USE studyhub;

-- Create Users table
CREATE TABLE Users (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Passwd VARCHAR(255) NOT NULL,
    RegistrationDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    LastLoginDate TIMESTAMP,
    SchoolName VARCHAR(255),
    Yr ENUM('Freshman', 'Sophomore', 'Junior', 'Senior', 'Graduated'),
    ProfilePicture VARCHAR(255), -- Added ProfilePicture column
    UNIQUE(Email)
);

CREATE TABLE DocumentStorage (
    DocumentID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT,
    Title VARCHAR(255) NOT NULL,
    FileType ENUM('PDF', 'Word') NOT NULL,
    DocumentData LONGBLOB NOT NULL,
    UploadDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
);



-- Create DocumentVersions table
CREATE TABLE DocumentVersions (
    VersionID INT AUTO_INCREMENT PRIMARY KEY,
    DocumentID INT NOT NULL,
    VersionNumber INT,
    UploadDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FilePath VARCHAR(255) NOT NULL,
    FOREIGN KEY (DocumentID) REFERENCES DocumentStorage(DocumentID)
);

-- Create Annotations table
CREATE TABLE Annotations (
    AnnotationID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT NOT NULL,
    DocumentID INT NOT NULL,
    AnnotationType ENUM('Comment', 'Highlight', 'Question'),
    AnnotationText TEXT,
    AnnotationDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (UserID) REFERENCES Users(UserID),
    FOREIGN KEY (DocumentID) REFERENCES DocumentStorage(DocumentID)
);

-- Create Tags table
CREATE TABLE Tags (
    TagID INT AUTO_INCREMENT PRIMARY KEY,
    TagName VARCHAR(255) NOT NULL
);

-- Create DocumentTags table
CREATE TABLE DocumentTags (
    DocumentTagID INT AUTO_INCREMENT PRIMARY KEY,
    DocumentID INT NOT NULL,
    TagID INT NOT NULL,
    FOREIGN KEY (DocumentID) REFERENCES DocumentStorage (DocumentID),
    FOREIGN KEY (TagID) REFERENCES Tags(TagID)
);

-- Create Reviews table
CREATE TABLE Reviews (
    ReviewID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT NOT NULL,
    DocumentID INT NOT NULL,
    Rating INT,
    ReviewText TEXT,
    ReviewDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (UserID) REFERENCES Users(UserID),
    FOREIGN KEY (DocumentID) REFERENCES DocumentStorage(DocumentID)
);

-- Alter DocumentVersions table to add a foreign key constraint
ALTER TABLE DocumentVersions
ADD CONSTRAINT FK_DocumentVersions_Documents
FOREIGN KEY (DocumentID)
REFERENCES DocumentStorage(DocumentID);
