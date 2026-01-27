CREATE DATABASE grade_db;


USE grade_db;


CREATE TABLE enroll (
  student_id INT,
  subject_id INT,
  score INT
);


INSERT INTO student VALUES
(202512345, '홍길동'),
(202567890, '김철수');

INSERT INTO subject VALUES
(1, 'DB'),
(2, '웹프로그래밍');

INSERT INTO enroll VALUES
(202512345, 1, 95),
(202512345, 2, 87),
(202567890, 1, 79);


SELECT
    s.name,
    sub.subject_name,
    e.score
FROM enroll e
JOIN student s ON e.student_id = s.student_id
JOIN subject sub ON e.subject_id = sub.subject_id;


SELECT
    s.name,
AVG(e.score) AS average_score
FROM enroll e
JOIN student s ON e.student_id = s.student_id
GROUP BY s.student_id;