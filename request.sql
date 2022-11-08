-- Задание №4
CREATE TABLE athletes(
	athlete_id INT PRIMARY KEY,
	name_athlete VARCHAR(150) NOT NULL,
	mail VARCHAR(320) NOT NULL,
	number_phone DECIMAL(10, 0),
	date_birth DATE,
	age DECIMAL(2, 0) NOT NULL,
	date_create_register TIMESTAMP NOT NULL,
	number_passport DECIMAL(10, 0) NOT NULL,
	competition_athletes_result_id INT NOT NULL,
	biography TEXT,
	video_file_path TEXT,
	FOREIGN KEY (competition_athletes_result_id) REFERENCES competition_athlete_result (competition_athletes_result_id)
);

SELECT name_athlete
FROM athletes
	 INNER JOIN competition_athletes_result USING(competition_athletes_result_id)
GROUP BY name_athlete
ORDER BY COUNT(competition_id)
LIMIT 5;