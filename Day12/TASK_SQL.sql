SELECT c.title, COUNT(e.student_id) AS student_count
FROM courses c
LEFT JOIN enrollments e ON c.id = e.course_id
WHERE c.id IN (SELECT course_id FROM enrollments)
GROUP BY c.title
HAVING COUNT(e.course_id) > 0
ORDER BY student_count DESC;


SELECT s.name, COUNT(e.course_id) AS course_count
FROM students s
LEFT JOIN enrollments e ON s.id = e.course_id
GROUP BY s.id, s.name
HAVING COUNT(e.course_id) > 0
ORDER BY course_count ASC
LIMIT 1;


SELECT name FROM students
WHERE id NOT IN (SELECT e.student_id FROM enrollments e)


SELECT s.name, COUNT(e.course_id) AS course_count
FROM students s
LEFT JOIN enrollments e ON s.id = e.student_id
GROUP BY s.id, s.name
HAVING COUNT(e.course_id) > 0
ORDER BY s.name;

