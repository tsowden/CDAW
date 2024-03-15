
CREATE TABLE IF NOT EXISTS Player (
    player_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Game (
    game_id INT AUTO_INCREMENT PRIMARY KEY,
    creator_player_id INT,
    CONSTRAINT fk_creator_player_id FOREIGN KEY (creator_player_id) REFERENCES PLAYER(player_id)
);


CREATE TABLE IF NOT EXISTS City (
    city_id INT AUTO_INCREMENT PRIMARY KEY,
    city_name VARCHAR(255) NOT NULL,
    city_latitude DECIMAL(9,6) NOT NULL,
    city_longitude DECIMAL(9,6) NOT NULL
);

CREATE TABLE IF NOT EXISTS Destination_Card (
    dc_id INT AUTO_INCREMENT PRIMARY KEY,
    dc_city_departure_id INT NOT NULL,
    dc_city_arrival_id INT NOT NULL,
    dc_points INT NOT NULL,
    dc_location INT,
    FOREIGN KEY (dc_city_departure_id) REFERENCES City(city_id),
    FOREIGN KEY (dc_city_arrival_id) REFERENCES City(city_id)
);

CREATE TABLE IF NOT EXISTS Road (
    road_id INT AUTO_INCREMENT PRIMARY KEY,
    road_departure_city_id INT NOT NULL,
    road_arrival_city_id INT NOT NULL,
    road_length INT NOT NULL,
    road_color VARCHAR(50) NOT NULL,
    FOREIGN KEY (road_departure_city_id) REFERENCES City(city_id),
    FOREIGN KEY (road_arrival_city_id) REFERENCES City(city_id)
);

CREATE TABLE IF NOT EXISTS Wagon_Card (
    wc_id INT AUTO_INCREMENT PRIMARY KEY,
    wc_color VARCHAR(50) NOT NULL,
    wc_image VARCHAR(50),
    wc_location INT
);

CREATE TABLE IF NOT EXISTS Friendship (
    friendship_id INT AUTO_INCREMENT PRIMARY KEY,
    friendship_status VARCHAR(50) NOT NULL,
    player_id1 INT NOT NULL,
    player_id2 INT NOT NULL,
    FOREIGN KEY (player_id1) REFERENCES Player(player_id),
    FOREIGN KEY (player_id2) REFERENCES Player(player_id)
);

CREATE TABLE IF NOT EXISTS Player_Stats (
    player_id INT NOT NULL PRIMARY KEY,
    stats_nb_games_played INT DEFAULT 0,
    stats_nb_games_won INT DEFAULT 0,
    FOREIGN KEY (player_id) REFERENCES Player(player_id)
);

CREATE TABLE IF NOT EXISTS Participation (
    game_id INT NOT NULL,
    player_id INT NOT NULL,
    PRIMARY KEY (game_id, player_id),
    FOREIGN KEY (game_id) REFERENCES Game(game_id),
    FOREIGN KEY (player_id) REFERENCES Player(player_id)
);

CREATE TABLE IF NOT EXISTS Invitation (
    invitation_id INT AUTO_INCREMENT PRIMARY KEY,
    game_id INT NOT NULL,
    player_id INT NOT NULL,
    invitation_status VARCHAR(50) NOT NULL,
    FOREIGN KEY (game_id) REFERENCES Game(game_id),
    FOREIGN KEY (player_id) REFERENCES Player(player_id)
);
