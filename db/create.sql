CREATE TABLE books (
    code_livre INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    annee_edition INT
);

CREATE TABLE authors (
    id_auteur INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL
);

CREATE TABLE book_author (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code_livre INT,
    id_auteur INT,
    FOREIGN KEY (code_livre) REFERENCES books(code_livre),
    FOREIGN KEY (id_auteur) REFERENCES authors(id_auteur)
);
