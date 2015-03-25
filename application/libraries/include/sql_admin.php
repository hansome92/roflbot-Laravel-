<?php
/**
 * This file contains the Admin SQL file.
 *
 * @author Laurence
 * @version  01/25/2013 
 */
define("USER_10", "SELECT
                    u.id AS id, u.fname AS fname, u.lname AS lname, u.email AS email, u.activated AS activated, u.password AS password, 
                    u.country AS country, u.city AS city, u.image AS image, u.user_type AS user_type, t.user_type AS utype, t.id AS tid, 
                    ggu.id AS gid, ggu.name AS gname
                   FROM %2\$susermaster u
                   LEFT JOIN  (SELECT g.*, gu.user AS uid FROM %2\$sgroupmaster g, %2\$sgroupuser gu WHERE gu.groups = g.id) ggu ON ggu.uid = u.id
                   LEFT JOIN  %2\$susertypes t ON t.id = u.user_type
                   WHERE u.id = '%1\$u'");
define("USER_20", "SELECT email FROM %2\$susermaster WHERE email = '%1\$s'");
define("USER_30", "SELECT
                    u.id AS id, u.fname AS fname, u.lname AS lname, u.email AS email, u.activated AS activated, t.user_type AS utype,
                    ggu.id AS gid, ggu.name AS gname
                   FROM %1\$susermaster u
                   LEFT JOIN  (SELECT g.*, gu.user AS uid FROM %1\$sgroupmaster g, %1\$sgroupuser gu WHERE gu.groups = g.id) ggu ON ggu.uid = u.id
                   LEFT JOIN  %1\$susertypes t ON t.id = u.user_type");
define("USER_40", "SELECT
                    u.id AS id, u.fname AS fname, u.lname AS lname, u.email AS email, u.activated AS activated, t.user_type AS utype,
                    ggu.id AS gid, ggu.name AS gname
                   FROM %2\$susermaster u
                   LEFT JOIN  (SELECT g.*, gu.user AS uid FROM %2\$sgroupmaster g, %2\$sgroupuser gu WHERE gu.groups = g.id) ggu ON ggu.uid = u.id
                   LEFT JOIN  %2\$susertypes t ON t.id = u.user_type
                   WHERE u.fname LIKE '%%%1\$s%%' OR u.lname LIKE '%%%1\$s%%'");
define("USER_50", "SELECT * FROM %2\$susersroles where user = '%1\$u'");
define("USER_60", "UPDATE %2\$susermaster SET last_login = NOW() WHERE id = '%1\$u'");
define("USER_70", "SELECT role FROM %2\$susersroles WHERE user = '%1\$u' ORDER BY id ASC");
define("USER_80", "SELECT * FROM %2\$sgroupuser WHERE user = '%1\$u'");
define("USER_90", "SELECT id, fname, lname, email, country, city, image, password
                   FROM %2\$susermaster
                   WHERE id = '%1\$u'");

define("USERPAGE_10", "SELECT
                        u.id AS id, u.fname AS fname, u.lname AS lname, u.email AS email, u.activated AS activated, u.country AS country, 
                        u.city AS city, t.user_type AS utype, ggu.id AS gid, ggu.name AS gname
                       FROM %1\$susermaster u
                       LEFT JOIN  (SELECT g.*, gu.user AS uid FROM %1\$sgroupmaster g, %1\$sgroupuser gu WHERE gu.groups = g.id) ggu ON ggu.uid = u.id
                       LEFT JOIN  %1\$susertypes t ON t.id = u.user_type");
define("USERPAGE_20", "SELECT
                        u.id AS id, u.fname AS fname, u.lname AS lname, u.email AS email, u.activated AS activated, u.country AS country, 
                        u.city AS city, t.user_type AS utype, ggu.id AS gid, ggu.name AS gname
                       FROM %2\$susermaster u
                       LEFT JOIN  (SELECT g.*, gu.user AS uid FROM %2\$sgroupmaster g, %2\$sgroupuser gu WHERE gu.groups = g.id) ggu ON ggu.uid = u.id
                       LEFT JOIN  %2\$susertypes t ON t.id = u.user_type
                       WHERE u.fname LIKE '%%%1\$s%%' OR u.lname LIKE '%%%1\$s%%'");
define("USERPAGE_30", "SELECT
                         u.id AS id, u.fname AS fname, u.lname AS lname, u.email AS email, u.activated AS activated, u.country AS country, 
                         u.city AS city, t.user_type AS utype, ggu.id AS gid, ggu.name AS gname
                        FROM %4\$susermaster u
                        LEFT JOIN  (SELECT g.*, gu.user AS uid FROM %4\$sgroupmaster g, %4\$sgroupuser gu WHERE gu.groups = g.id) ggu ON ggu.uid = u.id
                        LEFT JOIN  %4\$susertypes t ON t.id = u.user_type
                        WHERE u.fname LIKE '%%%1\$s%%' OR u.lname LIKE '%%%1\$s%%'
                        LIMIT %2\$u, %3\$u");

define("GROUP_10", "SELECT id,name, description, published FROM %1\$sgroupmaster");
define("GROUP_20", "SELECT id,name, description, published FROM %2\$sgroupmaster WHERE name LIKE '%%%1\$s%%'");
define("GROUP_30", "UPDATE %6\$sgroupmaster SET name = '%1\$s', description = '%2\$s', created_by = '%3\$u', published = '%4\$u' 
                    WHERE id = '%5\$u'");
define("GROUP_40", "SELECT id,name, description, published FROM %4\$sgroupmaster WHERE name LIKE '%%%1\$s%%' LIMIT %2\$u, %3\$u");

define("ROLE_10", "SELECT id,name, description FROM %1\$srolemaster");
define("ROLE_20", "SELECT id,name, description FROM %2\$srolemaster WHERE name LIKE '%%%1\$s%%'");
define("ROLE_30", "INSERT INTO %3\$srolemaster(name, description, created_at, modified_at) VALUES('%1\$s', '%2\$s', now(), now())");
define("ROLE_40", "UPDATE %4\$srolemaster SET name = '%1\$s', description = '%2\$s', modified_at = now() WHERE id = '%3\$u'");
define("ROLE_50", "SELECT id,name, description FROM %4\$srolemaster WHERE name LIKE '%%%1\$s%%' LIMIT %2\$u, %3\$u");

define("QUESTION_10", "SELECT feedback AS TrueFeedback,  fraction AS Fraction
                       FROM %3\$squestionsanswers
                       WHERE question = '%1\$u' AND answer = '%2\$s'");
define("QUESTION_20", "SELECT feedback AS FalseFeedback,  fraction AS Fraction
                       FROM %3\$squestionsanswers
                       WHERE question = '%1\$u' AND answer = '%2\$s'");
define("QUESTION_30", "SELECT max(questionid) AS maxID FROM %1\$squestionmaster");
define("QUESTION_40", "SELECT max(orders) AS maxOrder FROM %1\$squestionmaster");
define("QUESTION_50", "SELECT questionid AS No, name AS Name, description AS Description, questionType AS QuestionType, penalty AS Penalty
                       FROM %2\$squestionmaster
                       WHERE questionid = '%1\$u'
                       ORDER BY questionid");
define("QUESTION_60", "SELECT qaid AS No
                       FROM %3\$squestionsanswers
                       WHERE question = '%1\$u' AND answer = '%2\$s'");
define("QUESTION_70", "SELECT questionid AS No, name AS Name, questionType AS Type, penalty AS Penalty
                       FROM %4\$squestionmaster  
                       WHERE name LIKE '%%%1\$s%%'
                       ORDER BY orders LIMIT %2\$u, %3\$u");
define("QUESTION_80", "SELECT questionid AS No, name AS Name, questionType AS Type, penalty AS Penalty
                       FROM %3\$squestionmaster
                       ORDER BY orders LIMIT %1\$u, %2\$u");
define("QUESTION_90", "UPDATE %6\$squestionmaster SET name = '%1\$s', description = '%2\$s', questionType = '%3\$s', penalty = '%4\$f'
                       WHERE questionid = '%5\$u'");
define("QUESTION_100", "UPDATE %5\$squestionsanswers SET fraction = %1\$u, feedback = '%2\$s'
                        WHERE question = '%3\$u' AND answer = '%4\$s'");
define("QUESTION_110", "SELECT id AS No, questiontext AS QTEXT, answertext AS ATEXT
                        FROM %2\$squestions_match_sub
                        WHERE question = '%1\$u'
                        ORDER BY id");
define("QUESTION_120", "SELECT randomize AS Random FROM %2\$squestions_matching WHERE question = '%1\$u'");
define("QUESTION_130", "UPDATE %5\$squestionsanswers SET answer = '%1\$s', fraction = '%2\$f', feedback = '%3\$s'
                        WHERE qaid = '%4\$u'");
define("QUESTION_140", "UPDATE %5\$squestions_match_sub SET questiontext = '%1\$s', answertext = '%2\$s'
                        WHERE question = '%3\$u' AND id = '%4\$u'");
define("QUESTION_150", "UPDATE %3\$squestions_matching SET randomize = '%1\$u' WHERE question = '%2\$u'");
define("QUESTION_160", "SELECT qaid AS ID FROM %2\$squestionsanswers WHERE question = '%1\$u'");
define("QUESTION_170", "SELECT answer AS Answer, fraction AS Grade, feedback AS Feedback FROM %2\$squestionsanswers WHERE question = '%1\$u'");
define("QUESTION_180", "SELECT  lq.answer AS answer, lq.fraction AS frac, lq.feedback AS feedback, lqm.single AS single, lqm.randomize AS randomize
                        FROM %2\$squestionsanswers lq
                        LEFT JOIN %2\$squestions_multichoice lqm ON lqm.question = lq.question
                        WHERE lq.question = '%1\$u'");
define("QUESTION_190", "UPDATE %4\$squestions_multichoice SET single = '%1\$u', randomize = '%2\$u' WHERE question = '%3\$u'");
define("QUESTION_200", "SELECT questionid AS No, name AS QuestionName, questionType AS QuestionType FROM %1\$squestionmaster ORDER BY questionid");
//QUIZ QUERY
define("QUIZ_10", "SELECT max(orders) AS maxOrder FROM %1\$squizmaster");
define("QUIZ_20", "SELECT t.quizid AS No, t.name AS Name, t.description AS Description, t.grade AS Grade, q.questions AS Questioncount
                   FROM %4\$squizmaster t, %4\$squizquestion q
                   WHERE t.quizid = q.quiz  AND t.name LIKE '%%%1\$s%%'
                   ORDER BY t.orders LIMIT %2\$u, %3\$u" );
define("QUIZ_30", "SELECT t.quizid AS No, t.name AS Name, t.description AS Description, t.grade AS Grade, q.questions AS Questioncount
                   FROM %3\$squizmaster t, %3\$squizquestion q
                   WHERE t.quizid = q.quiz
                   ORDER BY t.orders LIMIT %1\$u, %2\$u" );
define("QUIZ_40", "SELECT quizid AS No, name AS Name, description AS Description, timer AS Timer, grade AS Grade, feedback AS Feedback,
                          questionsperpage AS QuestionsPerPage, randomize AS Randomize, courseid AS CourseId, moduleid AS ModuleId
                   FROM %2\$squizmaster
                   WHERE quizid = '%1\$u' ");
define("QUIZ_50", "SELECT quizid AS No FROM %2\$squizmaster WHERE orders = '%1\$u'");
define("QUIZ_60", "UPDATE %9\$squizmaster SET name = '%1\$s', description = '%2\$s', timer = '%3\$s', grade = '%4\$u',
                          questionsperpage = '%5\$u', created_by = '%6\$s', randomize = '%7\$u' 
                   WHERE quizid = '%8\$u'");
define("QUIZ_70", "SELECT quiz AS QuizId, questions AS Questions FROM %2\$squizquestion WHERE quiz = '%1\$u'");
define("QUIZ_80", "UPDATE %3\$squizquestion SET questions = '%1\$s' WHERE quiz = '%2\$u'");
define("QUIZ_90", "SELECT questions AS Questions FROM %1\$squizquestion");
define("QUIZ_100", "SELECT COUNT(*) AS records 
                    FROM %4\$squizmaster
                    WHERE name like '%%%1\$s%%' AND moduleid = '%2\$u' AND courseid = '%3\$u'
                    ORDER BY quizid");
define("QUIZ_110", "SELECT COUNT(*) AS records 
                    FROM %3\$squizmaster
                    WHERE moduleid = '%1\$u' AND courseid = '%2\$u'
                    ORDER BY quizid");
define("QUIZ_120", "SELECT COUNT(*) AS records FROM %1\$squizmaster ORDER BY quizid");
define("QUIZ_130", "SELECT t.quizid AS No, t.name AS Name, t.description AS Description, t.grade AS Grade, q.questions AS Questioncount
                   FROM %6\$squizmaster t, %6\$squizquestion q
                   WHERE t.quizid = q.quiz  AND t.name LIKE '%%%1\$s%%' AND moduleid = '%4\$u' AND courseid = '%5\$u'
                   ORDER BY t.orders LIMIT %2\$u, %3\$u" );
define("QUIZ_140", "SELECT t.quizid AS No, t.name AS Name, t.description AS Description, t.grade AS Grade, q.questions AS Questioncount
                   FROM %5\$squizmaster t, %5\$squizquestion q
                   WHERE t.quizid = q.quiz AND moduleid = '%3\$u' AND courseid = '%4\$u'
                   ORDER BY t.orders LIMIT %1\$u, %2\$u" );
define("QUIZ_150", "SELECT userid AS UserID, marks AS Marks, totalmarks AS TotalMarks, feedback AS Feedback, quizdate AS QuizDate
                    FROM %2\$squizresult
                    WHERE quizid = '%1\$u'");

define('SETTINGS_10', "SELECT id, fname, lname, email, country, city, image, password FROM %2\$susermaster WHERE id = '%1\$u'");
//MODULE QUERY
define('MODULE_10', "SELECT moduleid, name, module_type, created_by, create_date FROM %1\$smodulemaster");
define('MODULE_20', "SELECT moduleid, name, module_type, created_by, create_date 
                     FROM %2\$smodulemaster
                     WHERE name LIKE '%%%1\$s%%'");
define('MODULE_30', "SELECT moduleid, name, module_type, created_by, create_date 
                     FROM %4\$smodulemaster
                     WHERE name LIKE '%%%1\$s%%'
                     LIMIT %2\$u, %3\$u");
define('MODULE_40', "SELECT * FROM %2\$smodulemaster where moduleid = '%1\$u'");
//COURSE QUERY
define('COURSE_10', "SELECT lcm.courseid AS cid, lcm.name AS name, lcm.description AS description,
                            lcm.format AS format, lcm.reenroll AS reenroll, lcm.due_date AS due_date, ccu.name AS categoryname
                     FROM %1\$scoursemaster lcm
                     LEFT JOIN  (SELECT cm.name, cc.course AS cid FROM %1\$scategorymaster cm, %1\$scoursecategory cc 
                                    WHERE cc.category = cm.categoryid)ccu ON ccu.cid = lcm.courseid");
define('COURSE_20', "SELECT
                            lcm.courseid AS cid, lcm.name AS name, lcm.description AS description, lcm.format AS format, lcm.reenroll AS reenroll,                              lcm.due_date AS due_date, ccu.name AS categoryname
                     FROM %2\$scoursemaster lcm
                     LEFT JOIN  (SELECT cm.name, cc.course AS cid FROM %2\$scategorymaster cm, %2\$scoursecategory cc 
                                    WHERE cc.category = cm.categoryid)ccu ON ccu.cid = lcm.courseid
                     WHERE name LIKE '%%%1\$s%%'");
define('COURSE_30', "SELECT
                            lcm.courseid AS cid, lcm.name AS name, lcm.description AS description, lcm.format AS format, lcm.reenroll AS reenroll,                              lcm.due_date AS due_date, ccu.name AS categoryname
                     FROM %4\$scoursemaster lcm
                     LEFT JOIN  (SELECT cm.name, cc.course AS cid FROM %4\$scategorymaster cm, %4\$scoursecategory cc 
                                    WHERE cc.category = cm.categoryid)ccu ON ccu.cid = lcm.courseid
                     WHERE lcm.name LIKE '%%%1\$s%%'
                     LIMIT %2\$u, %3\$u");
define('COURSE_40', "SELECT * FROM %1\$scategorymaster");
define('COURSE_50', "SELECT
                            lcm.courseid AS cid, lcm.name AS name, lcm.description AS description, lcm.format AS format, lcm.reenroll AS reenroll,                                          lcm.due_date AS due_date, ccu.name AS categoryname, ccu.category AS category, ccu.cateId AS cateId
                     FROM %2\$scoursemaster lcm
                     LEFT JOIN  (SELECT cm.name, cc.course AS cid, cc.category AS category, cm.categoryid AS cateId 
                                 FROM %2\$scategorymaster cm, %2\$scoursecategory cc 
                                 WHERE cc.category = cm.categoryid)ccu ON ccu.cid = lcm.courseid
                     WHERE cid = '%1\$u'");
define('COURSE_60', "SELECT max(courseid) AS id FROM %1\$scoursemaster");
define('COURSE_70', "SELECT * 
                     FROM %3\$smodulemaster
                     LIMIT %1\$u, %2\$u");
define('COURSE_80', "SELECT * FROM %1\$smodulemaster");
define('COURSE_90', "SELECT * FROM %2\$scoursemodule WHERE course = '%1\$u'");
define('COURSE_100', "SELECT * FROM %1\$susermaster");
define('COURSE_110', "SELECT * FROM %3\$susermaster
                        LIMIT %1\$u, %2\$u");
define('COURSE_120', "SELECT * FROM %2\$scourseuser WHERE course = '%1\$u'");
//Learning QUERY
define('LEARNING_10', "SELECT * FROM %1\$scoursemaster");
define('LEARNING_20', "SELECT lc.course AS course, lc.module AS moduleid, lm.name AS name
                        FROM %1\$scoursemodule lc
                        LEFT JOIN %1\$smodulemaster lm ON lc.module = lm.moduleid
                        ORDER BY lc.course ASC");
define("LEARNING_30", "SELECT * FROM %1\$scoursemaster WHERE due_date < NOW()");
define("LEARNING_40", "SELECT lc.course AS course, lc.module AS moduleid, lm.name AS name
                            FROM %1\$scoursemodule lc
                            LEFT JOIN %1\$smodulemaster lm ON lc.module = lm.moduleid
                            LEFT JOIN %1\$scoursemaster lcm ON lc.course = lcm.courseid
                            WHERE lcm.due_date < NOW()
                            ORDER BY lc.course ASC");
define("LEARNING_50", "SELECT lcm.name AS name, lcm.courseid as courseid
                        FROM %2\$scoursemaster lcm
                        LEFT JOIN %2\$scoursemodule cm ON lcm.courseid = cm.course
                        WHERE cm.module = '%1\$u'");
define("LEARNING_60", "SELECT lmm.name as name, lmm.moduleid as moduleid, lcm.course as course
                        FROM %2\$smodulemaster lmm
                        LEFT JOIN %2\$scoursemodule lcm ON lmm.moduleid = lcm.module
                        WHERE lmm.moduleid = '%1\$u'");
define("LEARNING_70", "SELECT module FROM  %2\$smoduleuserunit WHERE IsUnitCompleted = 1 AND user = '%1\$u' GROUP BY module");
define("LEARNING_80", "SELECT userType FROM %2\$scourseuser WHERE user = '%1\$u'");
//Content QUERY
define("CONTENT_10", "SELECT * FROM %2\$smodulemaster
                        WHERE moduleid = '%1\$u'");
define("CONTENT_20", "SELECT max(unitid) AS id FROM %1\$sunitmaster");
define("CONTENT_30", "SELECT  lum.unitName AS unitName, lum.unitid AS unitid, lum.unitType AS unitType,
                              lum.unitContents AS unitContents, lum.userFilename AS userFilename
                        FROM %2\$sunitmaster lum
                        LEFT JOIN %2\$smoduleuserunit lmuu ON lum.unitid = lmuu.unit
                        WHERE lmuu.module = '%1\$u'
                        ORDER BY lum.unitid");
define("CONTENT_40", "SELECT lum.unitid AS unitid, lum.unitName AS unitName, lum.unitType AS unitType, 
                                lum.unitContents AS unitContents, lum.userFilename AS userFilename
                        FROM %2\$sunitmaster AS lum
                        LEFT JOIN %2\$smoduleuserunit AS lmuu ON lum.unitid = lmuu.unit
                        WHERE lum.unitid = (
                        SELECT MIN( unitid ) AS unitid
                        FROM %2\$sunitmaster AS um
                        LEFT JOIN %2\$smoduleuserunit AS muu ON um.unitid = muu.unit
                        WHERE muu.module = '%1\$u' )
                        ORDER BY lum.unitid");
define("CONTENT_50", "SELECT * FROM %2\$sunitmaster WHERE unitid = '%1\$u'");
define("CONTENT_60", "SELECT MIN( lum.unitid ) AS id, lum.unitName AS unitName, lum.unitType AS unitType,
                             lum.unitContents AS unitContents, lum.userFilename AS userFilename
                        FROM %3\$sunitmaster lum
                        LEFT JOIN %3\$smoduleuserunit lmuu ON lum.unitid = lmuu.unit
                        AND lmuu.module =  '%1\$u'
                        WHERE lum.unitid = ( 
                        SELECT MIN( unitid ) 
                        FROM %3\$sunitmaster
                        WHERE unitid >  '%2\$u' )");
define("CONTENT_70", "SELECT MAX( lum.unitid ) AS id, lum.unitName AS unitName, lum.unitType AS unitType,
                             lum.unitContents AS unitContents, lum.userFilename AS userFilename
                        FROM %3\$sunitmaster lum
                        LEFT JOIN %3\$smoduleuserunit lmuu ON lum.unitid = lmuu.unit
                        AND lmuu.module =  '%1\$u'
                        WHERE lum.unitid = ( 
                        SELECT MAX( unitid ) 
                        FROM %3\$sunitmaster
                        WHERE unitid <  '%2\$u' )");
define('CONTENT_80', "SELECT MAX( lum.unitid ) as unitid 
                        FROM %2\$sunitmaster lum
                        LEFT JOIN %2\$smoduleuserunit lmuu ON lum.unitid = lmuu.unit
                        WHERE lmuu.module =  '%1\$u'");
define('CONTENT_90', "SELECT MIN( lum.unitid ) as unitid 
                        FROM %2\$sunitmaster lum
                        LEFT JOIN %2\$smoduleuserunit lmuu ON lum.unitid = lmuu.unit
                        WHERE lmuu.module =  '2'");

define('CONTENT_100', "UPDATE  %4\$smoduleuserunit SET IsUnitCompleted =  '1' 
                       WHERE module = '%1\$u' AND user = '%2\$u' AND unit = '%3\$u'");
define('CONTENT_110', "SELECT module FROM %2\$smoduleuserunit WHERE module = '%1\$u' AND IsUnitCompleted = '1'");

define("DASHBOARD_10", "SELECT fname, lname, last_login FROM %2\$susermaster WHERE id = '%1\$u'");
define("DASHBOARD_20", "SELECT COUNT(*) as cnt FROM %2\$scourseuser lcu
                            INNER JOIN %2\$scoursemaster lcm ON lcm.courseid = lcu.course
                            INNER JOIN %2\$smoduleuserunit lmuu ON lmuu.course = lcu.course
                            AND lmuu.IsUnitCompleted != 1");
define("DASHBOARD_30", "SELECT lcm.courseid AS courseid, COUNT(*) as cnt FROM %3\$scoursemaster lcm
                            INNER JOIN %3\$smoduleuserunit lmuu ON lcm.courseid = lmuu.course
                            WHERE lmuu.IsUnitCompleted = 1");
define("DASHBOARD_40", "SELECT lcu.course AS courseid, COUNT( * ) AS cnt
                            FROM %2\$scourseuser lcu
                            INNER JOIN %2\$scoursemaster lcm ON lcm.courseid = lcu.course
                            INNER JOIN %2\$smoduleuserunit lmuu ON lmuu.course = lcu.course
                            AND lmuu.IsUnitCompleted !=1
                            GROUP BY lcu.course
                            ORDER BY cnt DESC ");
define("DASHBOARD_50", "SELECT lcm.courseid AS courseid, COUNT(*) AS cnt FROM %2\$scoursemaster lcm
                            INNER JOIN %2\$smoduleuserunit lmuu ON lcm.courseid = lmuu.course
                            WHERE lmuu.IsUnitCompleted = 1
                            GROUP BY lcm.courseid");
define("DASHBOARD_60", "SELECT lcm.name as name, lcm.courseid as courseid
                            FROM %2\$scoursemaster lcm
                            LEFT JOIN %2\$scourseuser lcu ON lcm.courseid = lcu.course
                            WHERE lcu.user = '%1\$u'");
define("DASHBOARD_70", "SELECT IsUnitCompleted, course
                            FROM %2\$smoduleuserunit
                            WHERE user = '%1\$u'
                            GROUP BY course");
//Homeprofile query
define("HOMEPROFILE_10", "SELECT * FROM %2\$susermaster WHERE id = '%1\$u'");

//Category QUERY
define("CATEGORY_10", "SELECT name AS Name, categoryid AS No 
                       FROM %4\$scategorymaster 
                       WHERE name like '%%%1\$s%%'
                       ORDER BY orders LIMIT %2\$u, %3\$u");
define("CATEGORY_20", "SELECT name AS Name, categoryid AS No
                       FROM %3\$scategorymaster 
                       ORDER BY orders LIMIT %1\$u, %2\$u");
define("CATEGORY_30", "SELECT max(orders) AS maxOrder FROM %1\$scategorymaster");
define("CATEGORY_40", "SELECT name AS Name, categoryid AS No FROM %2\$scategorymaster WHERE categoryid = '%1\$u'");
define("CATEGORY_50", "UPDATE %3\$s_categorymaster SET name = '%1\$s' WHERE categoryid = '%2\$u'");

/*define("FORUM_10", "SELECT forumid AS No, title AS Title, description AS Description
                    FROM lms_forum
                    WHERE moduleid = '%1\$u' && title like '%%%2\$s%%'
                    ORDER BY forumid LIMIT %3\$u, %4\$u");
define("FORUM_20", "SELECT forumid AS No, title AS Title, description AS Description 
                    FROM lms_forum
                    WHERE moduleid = '%1\$u'
                    ORDER BY forumid LIMIT %2\$u, %3\$u");
/*define("FORUM_30", "SELECT forumid AS No, title AS Title, description AS Description, moduleid AS ModuleId 
                    FROM lms_forum 
                    WHERE forumid = '%1\$u'");*/
define("FORUM_10", "SELECT forumid AS No, title AS Title, description AS Description
                    FROM %6\$sforum
                    WHERE moduleid = '%1\$u' AND courseid = '%2\$u' AND title like '%%%3\$s%%'
                    ORDER BY forumid LIMIT %4\$u, %5\$u");
define("FORUM_20", "SELECT forumid AS No, title AS Title, description AS Description 
                    FROM %5\$sforum
                    WHERE moduleid = '%1\$u' AND courseid = '%2\$u'
                    ORDER BY forumid LIMIT %3\$u, %4\$u");
define("FORUM_30", "SELECT forumid AS No, title AS Title, description AS Description, moduleid AS ModuleId, courseid AS CourseId 
                    FROM %2\$sforum 
                    WHERE forumid = '%1\$u'");
define("FORUM_40", "UPDATE %4\$sforum SET title = '%1\$s', description = '%2\$s' WHERE forumid = %3\$u");
define("FORUM_50", "SELECT forumid AS No, title AS Title, description AS Description 
                    FROM %2\$sforum 
                    WHERE moduleid = '%1\$u'");
define("FORUM_60", "SELECT COUNT(*) AS records FROM %4\$sforum WHERE title like '%%%1\$s%%' AND moduleid = '%2\$u' AND courseid = '%3\$u'");
define("FORUM_70", "SELECT COUNT(*) AS records FROM %3\$sforum WHERE moduleid = '%1\$u' AND courseid ='%2\$u'");
define("FORUM_80", "SELECT COUNT(*) AS records FROM %1\$sforum");
define("FORUM_90", "SELECT forumid AS No, title AS Title, description AS Description 
                    FROM %4\$sforum
                    WHERE title like '%%%1\$s%%'
                    ORDER BY forumid LIMIT %2\$u, %3\$u");
define("FORUM_100", "SELECT forumid AS No, title AS Title, description AS Description, moduleid AS moduleid, courseid AS courseid 
                     FROM %3\$sforum
                     ORDER BY forumid LIMIT %1\$u, %2\$u");

define("Discussion_10", "SELECT id AS No FROM %2\$sforum_discussions WHERE firstpost = '%1\$u'");
define("Discussion_20", "SELECT id AS No, forumid AS ForumId, name AS Discussion, firstpost AS Firstpost 
                         FROM %5\$sforum_discussions  
                         WHERE forumid = '%1\$u' && name like '%%%2\$s%%'
                         ORDER BY id LIMIT %3\$u, %4\$u");
define("Discussion_30", "SELECT id AS No FROM $2\$sforum_discussions WHERE name = '%1\$s'");
define("Discussion_40", "SELECT COUNT(*) AS records FROM %3\$sforum_discussions 
                         WHERE name like '%%%1\$s%%' && forumid = '%2\$u'");
define("Discussion_50", "SELECT forumid AS ForumId, id AS DiscussionID, name AS Discussion 
                         FROM %2\$sforum_discussions 
                         WHERE id = '%1\$u'");
define("Discussion_60", "UPDATE %3\$sforum_discussions SET timemodified = '%1\$s' WHERE firstpost = '%2\$u'");
define("Discussion_70", "UPDATE %3\$sforum_discussions SET firstpost = '%1\$u' WHERE name = '%2\$s'");

define("Post_10", "SELECT COUNT(*) AS records FROM %3\$sforum_posts 
                   WHERE subject like '%%%1\$s%%' && discussion = '%2\$s'");
define("Post_20", "SELECT no AS No, discussion AS Discussion, subject AS Subject, message AS Message, posted_by AS Posted
                   FROM %5\$sforum_posts
                   WHERE discussion = '%1\$s' && subject like '%%%2\$s%%'
                   ORDER BY no LIMIT %3\$u, %4\$u");
define("Post_30", "SELECT no AS No, discussion AS Discussion, subject AS Subject, message AS Message, posted_by AS Posted
                   FROM %4\$sforum_posts
                   WHERE discussion = '%1\$s'
                   ORDER BY no LIMIT %2\$u, %3\$u");
define("Post_40", "SELECT no AS No, discussion AS Discussion, parent AS Parent, subject AS Subject, message AS Message
                   FROM %2\$sforum_posts
                   WHERE no = '%1\$u'");
define("Post_50", "UPDATE %5\$sforum_posts SET modified = '%1\$s', subject = '%2\$s', message = '%3\$s' 
                   WHERE no = '%4\$u'");
define("Post_60", "SELECT max(no) AS MAXNO FROM %1\$sforum_posts");
define("Post_70", "SELECT no AS No FROM %2\$sforum_posts WHERE parent = '%1\$u'");

define("Task_10", "SELECT COUNT(*) AS records FROM %4\$staskmaster WHERE moduleid = '%1\$u' AND courseid = '%2\$u' AND taskname like '%%%3\$s%%' ORDER BY taskid");
define("Task_20", "SELECT COUNT(*) AS records FROM %3\$staskmaster WHERE moduleid = '%1\$u' AND courseid = '%2\$u' ORDER BY taskid");
define("Task_30", "SELECT taskid AS No, taskname AS TaskName, description AS Description, tasktype AS TaskType, grade AS Grade,
                          startdate AS StartDate, enddate AS EndDate,  maximumsize AS MaxSize, moduleid AS ModuleId, courseid AS CourseId
                   FROM %2\$staskmaster
                   WHERE taskid = '%1\$u'");
define("Task_40", "UPDATE %9\$staskmaster 
                   SET taskname = '%1\$s', description = '%2\$s', taskType = '%3\$u', grade = '%4\$u', startdate = '%5\$s', enddate = '%6\$s', maximumsize = '%7\$u'
                   WHERE taskid = '%8\$u'");
define("Task_50", "SELECT id AS ID, taskid AS TaskID, createdate AS CreateDate, modifydate AS ModifyDate, grade AS Grade
                   FROM %2\$stask_submissions
                   WHERE taskid = '%1\$u'");
define("Task_60", "SELECT taskid AS No, taskname AS TaskName, description AS Description, tasktype AS TaskType, grade AS Grade, maximumsize AS MaxSize, 
                   moduleid AS ModuleId, startdate AS StartDate, enddate AS EndDate
                   FROM %6\$staskmaster
                   WHERE moduleid = '%1\$u' AND courseid = '%2\$u' AND taskname like '%%%3\$s%%'
                   ORDER BY taskid LIMIT %4\$u, %5\$u");
define("Task_70", "SELECT taskid AS No, taskname AS TaskName, description AS Description, tasktype AS TaskType, grade AS Grade, maximumsize AS MaxSize, 
                   moduleid AS ModuleId, startdate AS StartDate, enddate AS EndDate
                   FROM %4\$staskmaster
                   WHERE taskname like '%%%1\$s%%'
                   ORDER BY taskid LIMIT %2\$u, %3\$u");
define("Task_80", "SELECT taskid AS No, taskname AS TaskName, description AS Description, tasktype AS TaskType, grade AS Grade, maximumsize AS MaxSize, 
                   moduleid AS ModuleId, startdate AS StartDate, enddate AS EndDate
                   FROM %5\$staskmaster
                   WHERE moduleid = '%1\$u' AND courseid = '%2\$u'
                   ORDER BY taskid LIMIT %3\$u, %4\$u");
define("Task_90", "SELECT taskid AS No, taskname AS TaskName, description AS Description, tasktype AS TaskType, grade AS Grade, maximumsize AS MaxSize, 
                   moduleid AS ModuleId, startdate AS StartDate, enddate AS EndDate
                   FROM %3\$staskmaster
                   ORDER BY taskid LIMIT %1\$u, %2\$u");
define("Task_100", "SELECT COUNT(*) AS records FROM %1\$staskmaster ORDER BY taskid");
define("Task_110", "SELECT grade AS Grade FROM %3\$stask_submissions WHERE taskid = '%1\$u' AND userid = '%2\$u'");
define("Task_120", "SELECT userid AS UserID, modifydate AS Date, grade AS Grade, submissionfeedback AS Feedback, type AS Type, submissiontext AS Text
                    FROM %2\$stask_submissions WHERE taskid = '%1\$u'");
define("Task_130", "UPDATE %6\$stask_submissions SET modifydate = '%1\$s', grade = '%2\$u', submissionfeedback = '%3\$s'
                    WHERE taskid = '%4\$u' AND userid = '%5\$u'");
define("Task_140", "SELECT taskid AS No, taskname AS TaskName, moduleid AS moduleid, courseid AS courseid FROM %1\$staskmaster");

define("INSTALL_10", "SELECT password AS Pass FROM mysql.user;");
define("INSTALL_20", "SHOW DATABASES;");
define("INSTALL_30", "DROP DATABASE %1\$s");
define("INSTALL_40", "CREATE DATABASE %1\$s");
define("INSTALL_50", "USE %1\$s");
define("INSTALL_60", "INSERT INTO %1\$susermaster 
                    (
                       id, fname, lname, email, password, activated, created_date, last_login,
                       address, image, country, city, state, zipcode, session, user_type
                    )
                    VALUES
                    (1, '%2\$s', '%2\$s', '%3\$s', '%4\$s', '1', '%5\$s', 
                     NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1,2,3,4,5');");
define("INSTALL_70", "INSERT INTO %1\$susersroles 
                    (id, user, role, created_at)
                    VALUES
                    (1, '1', '1', '%2\$s');");
define("INSTALL_80", "INSERT INTO %1\$susertypes
                    (id, user_type)
                    VALUES
                    (1, 'Admin'),(2, 'Course Manager'),(3, 'Teacher'),(4, 'Student'),(5, 'User');");
define("INSTALL_90", "INSERT INTO %1\$srolemaster
                    (id, name, description, created_at, modified_at)
                    VALUES
                    (1, 'GLOBAL SETTING', 'GLOBAL SETTING', '%2\$s', '%2\$s'),
                    (2, 'COURSE', 'COURSE', '%2\$s', '%2\$s'),
                    (3, 'QUESTION', 'QUESTION', '%2\$s', '%2\$s'),
                    (4, 'LEARNING', 'LEARNING', '%2\$s', '%2\$s');");

define("CREATE_10", "CREATE TABLE %1\$scategorymaster 
                    (
                      categoryid bigint(11) NOT NULL AUTO_INCREMENT,
                      name varchar(255) DEFAULT NULL,
                      parent bigint(20) DEFAULT NULL,
                      orders int(11) DEFAULT NULL,
                      published tinyint(2) DEFAULT NULL,
                      PRIMARY KEY (categoryid)
                    )
                     ENGINE=MyISAM  DEFAULT CHARSET=utf8;");
define("CREATE_20", "CREATE TABLE %1\$scoursecategory 
                    (
                      category bigint(20) NOT NULL,
                      course bigint(20) NOT NULL
                    )
                     ENGINE=MyISAM DEFAULT CHARSET=utf8;");
define("CREATE_30", "CREATE TABLE %1\$scoursemaster
                   (
                     courseid bigint(11) NOT NULL AUTO_INCREMENT,
                     name varchar(255) DEFAULT NULL,
                     description text,
                     format varchar(10) DEFAULT NULL,
                     due_date varchar(10) DEFAULT NULL,
                     specific_date timestamp NULL DEFAULT NULL,
                     fixed_date int(11) NOT NULL,
                     reenroll tinyint(2) DEFAULT NULL,
                     created_by int(11) DEFAULT NULL,
                     created_date timestamp NULL DEFAULT NULL,
                     published tinyint(2) NOT NULL,
                     PRIMARY KEY (courseid)
                   )
                    ENGINE=MyISAM  DEFAULT CHARSET=utf8;");
define("CREATE_40", "CREATE TABLE %1\$scoursemodule
                  (
                     course bigint(20) NOT NULL,
                     module bigint(20) NOT NULL,
                     created_date datetime NOT NULL
                  )
                   ENGINE=MyISAM DEFAULT CHARSET=utf8;");
define("CREATE_50", "CREATE TABLE %1\$scourseuser
                  (
                     user bigint(11) NOT NULL,
                     course bigint(11) NOT NULL,
                     userType varchar(50) DEFAULT NULL,
                     joined_date timestamp NULL DEFAULT NULL,
                     completed_date timestamp NULL DEFAULT NULL,
                     over_due tinyint(2) DEFAULT NULL,
                     last_updated date DEFAULT NULL,
                     last_viewed datetime DEFAULT NULL
                  )
                   ENGINE=MyISAM DEFAULT CHARSET=utf8;");
define("CREATE_60", "CREATE TABLE %1\$sforum 
                  (
                     forumid bigint(11) unsigned NOT NULL AUTO_INCREMENT,
                     title varchar(255) NOT NULL,
                     description text NOT NULL,
                     courseid bigint(11) unsigned NOT NULL,
                     moduleid bigint(11) unsigned NOT NULL,
                     PRIMARY KEY (forumid)
                  )
                   ENGINE=InnoDB  DEFAULT CHARSET=latin1;");
define("CREATE_70", "CREATE TABLE %1\$sforum_discussions
                  (
                     id bigint(11) unsigned NOT NULL AUTO_INCREMENT,
                     forumid bigint(11) unsigned NOT NULL,
                     name varchar(255) NOT NULL,
                     firstpost bigint(11) unsigned NOT NULL,
                     timemodified date NOT NULL,
                     PRIMARY KEY (id)
                  )
                   ENGINE=InnoDB  DEFAULT CHARSET=latin1;");
define("CREATE_80", "CREATE TABLE %1\$sforum_posts
                  (
                     no bigint(11) unsigned NOT NULL AUTO_INCREMENT,
                     discussion varchar(15) NOT NULL,
                     parent bigint(11) unsigned NOT NULL,
                     created date NOT NULL,
                     modified date NOT NULL,
                     subject varchar(256) NOT NULL,
                     message text NOT NULL,
                     posted_by varchar(255) NOT NULL,
                     PRIMARY KEY (no)
                  )
                   ENGINE=InnoDB  DEFAULT CHARSET=latin1;");
define("CREATE_90", "CREATE TABLE %1\$sgroupmaster
                  (
                     id bigint(11) NOT NULL AUTO_INCREMENT,
                     name varchar(200) DEFAULT NULL,
                     description text,
                     created_by int(11) DEFAULT NULL,
                     published tinyint(4) DEFAULT NULL,
                     PRIMARY KEY (id)
                  ) 
                   ENGINE=MyISAM  DEFAULT CHARSET=utf8;");
define("CREATE_100", "CREATE TABLE %1\$sgroupuser
                  (
                     user bigint(20) NOT NULL,
                     groups bigint(20) NOT NULL
                  )
                   ENGINE=MyISAM DEFAULT CHARSET=utf8;");
define("CREATE_110", "CREATE TABLE %1\$smodulemaster
                  (
                     moduleid bigint(11) NOT NULL AUTO_INCREMENT,
                     name varchar(255) NOT NULL,
                     module_type varchar(11) NOT NULL,
                     maxusers int(11) DEFAULT NULL,
                     orders int(11) DEFAULT NULL,
                     created_by int(11) DEFAULT NULL,
                     create_date timestamp NULL DEFAULT NULL,
                     published tinyint(4) DEFAULT NULL,
                     PRIMARY KEY (moduleid)
                  )
                   ENGINE=MyISAM  DEFAULT CHARSET=utf8;");
define("CREATE_120", "CREATE TABLE %1\$smoduleuserunit
                  (
                     module bigint(20) NOT NULL,
                     unit bigint(20) NOT NULL,
                     user bigint(20) NOT NULL,
                     course bigint(20) NOT NULL,
                     IsUnitStarted tinyint(2) DEFAULT NULL,
                     IsUnitCompleted tinyint(2) DEFAULT NULL,
                     UnitCompletedDate datetime DEFAULT NULL,
                     ModuleFinish tinyint(2) DEFAULT NULL
                  )
                   ENGINE=MyISAM DEFAULT CHARSET=utf8;");
define("CREATE_130", "CREATE TABLE %1\$spermissionmaster
                  (
                     id bigint(11) NOT NULL AUTO_INCREMENT,
                     permName varchar(255) DEFAULT NULL,
                     permValue varchar(100) DEFAULT NULL,
                     PRIMARY KEY (id)
                  )
                   ENGINE=MyISAM  DEFAULT CHARSET=utf8;");
define("CREATE_140", "CREATE TABLE %1\$squestionmaster
                  (
                     questionid bigint(11) NOT NULL AUTO_INCREMENT,
                     name varchar(255) DEFAULT NULL,
                     description text,
                     questionType varchar(12) DEFAULT NULL,
                     penalty double DEFAULT NULL,
                     created_by bigint(11) DEFAULT NULL,
                     orders int(11) DEFAULT NULL,
                     PRIMARY KEY (questionid)
                  )
                   ENGINE=MyISAM  DEFAULT CHARSET=utf8;");
define("CREATE_150", "CREATE TABLE %1\$squestionsanswers
                  (
                     qaid bigint(11) NOT NULL AUTO_INCREMENT,
                     question bigint(11) NOT NULL,
                     answer text,
                     fraction double(2,1) DEFAULT NULL,
                     feedback text,
                     PRIMARY KEY (qaid)
                  )
                   ENGINE=MyISAM  DEFAULT CHARSET=utf8;");
define("CREATE_160", "CREATE TABLE %1\$squestions_matching
                  (
                     id bigint(11) NOT NULL AUTO_INCREMENT,
                     question bigint(11) NOT NULL,
                     subquestions varchar(255) NOT NULL,
                     randomize tinyint(2) NOT NULL,
                     PRIMARY KEY (id)
                  )
                   ENGINE=MyISAM  DEFAULT CHARSET=latin1;");
define("CREATE_170", "CREATE TABLE %1\$squestions_match_sub
                  (
                     id bigint(11) NOT NULL AUTO_INCREMENT,
                     code bigint(11) NOT NULL,
                     question bigint(11) NOT NULL,
                     questiontext text NOT NULL,
                     answertext varchar(255) NOT NULL,
                     PRIMARY KEY (id)
                  )
                   ENGINE=MyISAM  DEFAULT CHARSET=latin1;");
define("CREATE_180", "CREATE TABLE %1\$squestions_multichoice
                  (
                     id bigint(11) NOT NULL AUTO_INCREMENT,
                     question bigint(11) NOT NULL,
                     answers varchar(255) NOT NULL,
                     single smallint(6) NOT NULL,
                     randomize tinyint(2) NOT NULL,
                     correctfeedback text NOT NULL,
                     incorrectfeedback text NOT NULL,
                     PRIMARY KEY (id)
                  )
                   ENGINE=MyISAM  DEFAULT CHARSET=latin1;");
define("CREATE_190", "CREATE TABLE %1\$squestions_shortanswer
                  (
                     id bigint(11) NOT NULL AUTO_INCREMENT,
                     question bigint(11) NOT NULL,
                     answers bigint(11) NOT NULL,
                     PRIMARY KEY (id)
                  )
                   ENGINE=MyISAM  DEFAULT CHARSET=latin1;");
define("CREATE_200", "CREATE TABLE %1\$squestions_truefalse
                  (
                     id bigint(11) NOT NULL AUTO_INCREMENT,
                     question bigint(20) NOT NULL,
                     trueanswer bigint(11) NOT NULL,
                     falseanswer bigint(11) NOT NULL,
                     PRIMARY KEY (id)
                  )
                   ENGINE=MyISAM  DEFAULT CHARSET=latin1;");
define("CREATE_210", "CREATE TABLE %1\$squizmaster
                  (
                     quizid bigint(11) NOT NULL AUTO_INCREMENT,
                     name varchar(255) DEFAULT NULL,
                     description text,
                     questionsperpage int(11) DEFAULT NULL,
                     timer int(11) DEFAULT NULL,
                     grade float DEFAULT NULL,
                     feedback varchar(256) NOT NULL,
                     randomize tinyint(2) DEFAULT NULL,
                     created_by bigint(11) DEFAULT NULL,
                     orders int(11) DEFAULT NULL,
                     courseid bigint(11) NOT NULL,
                     moduleid bigint(11) NOT NULL,
                     PRIMARY KEY (quizid)
                  )
                   ENGINE=MyISAM  DEFAULT CHARSET=utf8;");
define("CREATE_220", "CREATE TABLE %1\$squizquestion
                  (
                     quiz bigint(11) NOT NULL,
                     questions text NOT NULL
                  )
                   ENGINE=MyISAM DEFAULT CHARSET=utf8;");
define("CREATE_230", "CREATE TABLE %1\$squizresult
                  (
                     id bigint(11) unsigned NOT NULL AUTO_INCREMENT,
                     userid bigint(11) unsigned NOT NULL,
                     quizid bigint(11) unsigned NOT NULL,
                     marks float NOT NULL,
                     totalmarks float NOT NULL,
                     feedback varchar(256) NOT NULL,
                     quizdate date NOT NULL,
                     moduleid bigint(11) unsigned NOT NULL,
                     courseid bigint(11) unsigned NOT NULL,
                     PRIMARY KEY (id)
                  )
                   ENGINE=InnoDB  DEFAULT CHARSET=latin1;");
define("CREATE_240", "CREATE TABLE %1\$srolemaster
                  (
                     id bigint(11) NOT NULL AUTO_INCREMENT,
                     name varchar(100) DEFAULT NULL,
                     description text,
                     created_at datetime NOT NULL,
                     modified_at datetime NOT NULL,
                     PRIMARY KEY (id)
                  )
                   ENGINE=MyISAM  DEFAULT CHARSET=utf8;");
define("CREATE_250", "CREATE TABLE %1\$srolepermissions
                  (
                     role bigint(20) NOT NULL,
                     permission bigint(20) NOT NULL
                  )
                   ENGINE=MyISAM DEFAULT CHARSET=utf8;");
define("CREATE_260", "CREATE TABLE %1\$sscormmaster
                  (
                     scormid bigint(11) NOT NULL AUTO_INCREMENT,
                     course bigint(11) DEFAULT NULL,
                     scormname varchar(255) DEFAULT NULL,
                     description text,
                     reference varchar(255) DEFAULT NULL,
                     filesize varchar(255) DEFAULT NULL,
                     timemodified datetime DEFAULT NULL,
                     format varchar(50) DEFAULT NULL,
                     published tinyint(11) DEFAULT NULL,
                     PRIMARY KEY (scormid)
                  )
                   ENGINE=MyISAM DEFAULT CHARSET=utf8;");
define("CREATE_270", "CREATE TABLE %1\$sscorm_scoes
                  (
                     scoid bigint(11) NOT NULL AUTO_INCREMENT,
                     scormid bigint(11) NOT NULL,
                     manifest varchar(255) DEFAULT NULL,
                     organization varchar(255) DEFAULT NULL,
                     parent varchar(255) DEFAULT NULL,
                     identifier varchar(255) DEFAULT NULL,
                     launch varchar(255) DEFAULT NULL,
                     scormtype varchar(5) DEFAULT NULL,
                     title varchar(255) DEFAULT NULL,
                     PRIMARY KEY (scoid)
                  )
                   ENGINE=MyISAM DEFAULT CHARSET=utf8;");
define("CREATE_280", "CREATE TABLE %1\$sscorm_scoes_data
                  (
                     id bigint(11) NOT NULL AUTO_INCREMENT,
                     scormid bigint(11) NOT NULL,
                     scoid bigint(11) NOT NULL,
                     elementname varchar(255) DEFAULT NULL,
                     elementvalue varbinary(255) DEFAULT NULL,
                     PRIMARY KEY (id)
                  )
                   ENGINE=MyISAM DEFAULT CHARSET=utf8;");
define("CREATE_290", "CREATE TABLE %1\$sscorm_scoes_track
                  (
                     trackid bigint(20) NOT NULL AUTO_INCREMENT,
                     scormid bigint(20) NOT NULL,
                     scoid bigint(20) NOT NULL,
                     userid bigint(20) NOT NULL,
                     attempt int(11) DEFAULT NULL,
                     elementname varchar(255) DEFAULT NULL,
                     elementvalue varchar(255) DEFAULT NULL,
                     timemodified datetime DEFAULT NULL,
                     objectiveid varchar(255) DEFAULT NULL,
                     PRIMARY KEY (trackid)
                  )
                   ENGINE=MyISAM DEFAULT CHARSET=utf8;");
define("CREATE_300", "CREATE TABLE %1\$sscorm_seq_mapinfo
                  (
                     mapinfoid bigint(11) NOT NULL AUTO_INCREMENT,
                     scormid bigint(11) NOT NULL,
                     scoid bigint(11) NOT NULL,
                     objectiveid bigint(11) DEFAULT NULL,
                     targetobjectiveid varchar(255) DEFAULT NULL,
                     readsatisfiedstatus tinyint(2) DEFAULT NULL,
                     readnormalizedmeasure tinyint(2) DEFAULT NULL,
                     writesatisfiedstatus tinyint(2) DEFAULT NULL,
                     writenormalizedmeasure tinyint(2) DEFAULT NULL,
                     PRIMARY KEY (mapinfoid)
                  )
                   ENGINE=MyISAM DEFAULT CHARSET=utf8;");
define("CREATE_310", "CREATE TABLE %1\$sscorm_seq_objective
                  (
                     seqobjectiveid bigint(11) NOT NULL AUTO_INCREMENT,
                     scormid bigint(11) NOT NULL,
                     scoid bigint(11) NOT NULL,
                     primaryobj tinyint(2) DEFAULT NULL,
                     objectiveid varchar(50) DEFAULT NULL,
                     satisfiedbymeasure tinyint(2) DEFAULT NULL,
                     minnormalizedmeasure float DEFAULT NULL,
                     PRIMARY KEY (seqobjectiveid)
                  )
                   ENGINE=MyISAM DEFAULT CHARSET=utf8;");
define("CREATE_320", "CREATE TABLE %1\$sscorm_seq_rolluprule
                  (
                     rollupruleid bigint(20) NOT NULL AUTO_INCREMENT,
                     scormid bigint(20) NOT NULL,
                     scoid bigint(20) NOT NULL,
                     childactivityset varchar(255) DEFAULT NULL,
                     minimumcount varchar(255) DEFAULT NULL,
                     minimumpercent float DEFAULT NULL,
                     conditioncombination varchar(3) DEFAULT NULL,
                     action varchar(15) DEFAULT NULL,
                     PRIMARY KEY (rollupruleid)
                  )
                   ENGINE=MyISAM DEFAULT CHARSET=utf8;");
define("CREATE_330", "CREATE TABLE %1\$sscorm_seq_rolluprulecond
                  (
                     rollupruleconditionid bigint(11) NOT NULL AUTO_INCREMENT,
                     scormid bigint(11) NOT NULL,
                     scoid bigint(11) NOT NULL,
                     rollupruleid bigint(11) NOT NULL,
                     operator varchar(5) DEFAULT NULL,
                     cond bigint(25) DEFAULT NULL,
                     PRIMARY KEY (rollupruleconditionid)
                  )
                   ENGINE=MyISAM DEFAULT CHARSET=utf8;");
define("CREATE_340", "CREATE TABLE %1\$sscorm_seq_rulecond
                  (
                     rulecondid bigint(11) NOT NULL AUTO_INCREMENT,
                     scormid bigint(11) NOT NULL,
                     scoid bigint(11) NOT NULL,
                     ruleconditionsid bigint(11) NOT NULL,
                     referencedobjective varchar(255) DEFAULT NULL,
                     measurethreshold float DEFAULT NULL,
                     operator varchar(5) DEFAULT NULL,
                     cond varchar(30) DEFAULT NULL,
                     PRIMARY KEY (rulecondid)
                  )
                   ENGINE=MyISAM DEFAULT CHARSET=utf8;");
define("CREATE_350", "CREATE TABLE %1\$sscorm_seq_ruleconds
                  (
                     ruleconditionsid bigint(11) NOT NULL AUTO_INCREMENT,
                     scormid bigint(11) NOT NULL,
                     scoid bigint(11) NOT NULL,
                     conditioncombination varchar(5) DEFAULT NULL,
                     ruletype int(10) DEFAULT NULL,
                     action varchar(25) DEFAULT NULL,
                     PRIMARY KEY (ruleconditionsid)
                  ) ENGINE=MyISAM DEFAULT CHARSET=utf8;");
define("CREATE_360", "CREATE TABLE %1\$staskmaster
                  (
                     taskid bigint(11) unsigned NOT NULL AUTO_INCREMENT,
                     taskname varchar(255) NOT NULL,
                     description text NOT NULL,
                     tasktype tinyint(2) NOT NULL,
                     grade int(3) NOT NULL,
                     startdate date NOT NULL,
                     enddate date NOT NULL,
                     maximumsize smallint(3) DEFAULT NULL,
                     courseid bigint(11) NOT NULL,
                     moduleid bigint(11) NOT NULL,
                     PRIMARY KEY (taskid)
                  )
                   ENGINE=InnoDB  DEFAULT CHARSET=latin1;");
define("CREATE_370", "CREATE TABLE %1\$stask_submissions
                  (
                     id bigint(11) unsigned NOT NULL AUTO_INCREMENT,
                     taskid bigint(11) unsigned NOT NULL,
                     userid bigint(11) unsigned NOT NULL,
                     createdate date NOT NULL,
                     modifydate date NOT NULL,
                     grade int(3) unsigned NOT NULL,
                     submissionfeedback varchar(255) NOT NULL,
                     type tinyint(4) NOT NULL,
                     submissiontext text NOT NULL,
                     PRIMARY KEY (id)
                  )
                   ENGINE=InnoDB  DEFAULT CHARSET=latin1;");
define("CREATE_380", "CREATE TABLE %1\$sunitmaster
                  (
                     unitid bigint(11) NOT NULL AUTO_INCREMENT,
                     unitName varchar(255) DEFAULT NULL,
                     unitType int(11) DEFAULT NULL,
                     unitContents text,
                     userFilename varchar(255) DEFAULT NULL,
                     created_by bigint(20) DEFAULT NULL,
                     created_date timestamp NULL DEFAULT NULL,
                     isDeleted tinyint(4) DEFAULT NULL,
                     published tinyint(4) DEFAULT NULL,
                     PRIMARY KEY (unitid)
                  )
                   ENGINE=MyISAM  DEFAULT CHARSET=utf8;");
define("CREATE_390", "CREATE TABLE %1\$susermaster
                  (
                     id bigint(11) NOT NULL AUTO_INCREMENT,
                     fname varchar(100) DEFAULT NULL,
                     lname varchar(100) DEFAULT NULL,
                     email varchar(150) DEFAULT NULL,
                     password varchar(250) DEFAULT NULL,
                     activated tinyint(1) DEFAULT NULL,
                     created_date timestamp NULL DEFAULT NULL,
                     last_login timestamp NULL DEFAULT NULL,
                     address varchar(255) DEFAULT NULL,
                     image varchar(100) DEFAULT NULL,
                     country varchar(100) DEFAULT NULL,
                     city varchar(200) DEFAULT NULL,
                     state varchar(200) DEFAULT NULL,
                     zipcode varchar(100) DEFAULT NULL,
                     session tinyint(1) DEFAULT NULL,
                     user_type varchar(10) DEFAULT NULL,
                     PRIMARY KEY (id)
                  )
                   ENGINE=MyISAM  DEFAULT CHARSET=utf8;");
define("CREATE_400", "CREATE TABLE %1\$susersroles
                  (
                     id bigint(11) NOT NULL AUTO_INCREMENT,
                     user bigint(20) NOT NULL,
                     role bigint(20) NOT NULL,
                     created_at datetime NOT NULL,
                     PRIMARY KEY (id)
                  )
                   ENGINE=MyISAM  DEFAULT CHARSET=utf8;");
define("CREATE_410", "CREATE TABLE %1\$susertypes
                  (
                     id int(10) unsigned NOT NULL AUTO_INCREMENT,
                     user_type varchar(45) NOT NULL DEFAULT '',
                     PRIMARY KEY (id)
                  )
                   ENGINE=InnoDB  DEFAULT CHARSET=latin1;");
?>
