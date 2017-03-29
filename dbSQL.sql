/*Give me details of the companies which are on the Fortune 500 list*/
SELECT COMPANY_NAME
FROM JOB_PROVIDER 
WHERE FORTUNE_500 = 'Y'
ORDER BY COMPANY_NAME DESC;

COMPANY_NAME
-------------------------
TARGET CORPORATION
STATE FARM
MICROSOFT
JOHNSON AND JOHNSON
FEDEX
COSCO
APPLE
AMAZON

8 rows selected.

/*List of companies with minimum GPA_Requirement of 3.5 along with vacancies and applicable JOB SEEKERS*/
SELECT S.SSN, S.JOB_SEEKER_NAME, J.COMPANY_NAME, J.VACANCY_COUNT, J.GPA_REQ
FROM JOB J, JOB_SEEKER S, SEARCH_FOR C 
WHERE J.JOB_ID = C.JOB_ID
AND J.COMPANY_NAME = C.COMPANY_NAME
AND S.SSN = C.SSN
AND J.GPA_REQ >= 3.5;

Result -
       SSN JOB_SEEKER_NAME                COMPANY_NAME
---------- ------------------------------ -------------------------
VACANCY_COUNT    GPA_REQ
------------- ----------
 652819671 RON                            APPLE
            2        3.8

 887167354 ALISON                         APPLE
            2        3.8

 765112656 ELIZABETH                      APPLE
            2        3.8


       SSN JOB_SEEKER_NAME                COMPANY_NAME
---------- ------------------------------ -------------------------
VACANCY_COUNT    GPA_REQ
------------- ----------
 767334123 EMMA                           APPLE
            2        3.8

 767123981 RICHARD                        APPLE
            2        3.8

 778364510 JULLIE                         APPLE
            2        3.8


       SSN JOB_SEEKER_NAME                COMPANY_NAME
---------- ------------------------------ -------------------------
VACANCY_COUNT    GPA_REQ
------------- ----------
 128456289 ANTONY                         APPLE
            2        3.8

 981672551 BOB                            APPLE
            2        3.8

 453112891 ROSE                           APPLE
            2        3.8


       SSN JOB_SEEKER_NAME                COMPANY_NAME
---------- ------------------------------ -------------------------
VACANCY_COUNT    GPA_REQ
------------- ----------
 721563198 IAN                            APPLE
            2        3.8

 235198112 ROBERT                         APPLE
            2        3.8

 761563226 CHRISTINE                      APPLE
            2        3.8


       SSN JOB_SEEKER_NAME                COMPANY_NAME
---------- ------------------------------ -------------------------
VACANCY_COUNT    GPA_REQ
------------- ----------
 652819671 RON                            MICROSOFT
            1        3.7

 887167354 ALISON                         MICROSOFT
            1        3.7

 765112656 ELIZABETH                      MICROSOFT
            1        3.7


       SSN JOB_SEEKER_NAME                COMPANY_NAME
---------- ------------------------------ -------------------------
VACANCY_COUNT    GPA_REQ
------------- ----------
 767334123 EMMA                           MICROSOFT
            1        3.7

 767123981 RICHARD                        MICROSOFT
            1        3.7

 778364510 JULLIE                         MICROSOFT
            1        3.7


       SSN JOB_SEEKER_NAME                COMPANY_NAME
---------- ------------------------------ -------------------------
VACANCY_COUNT    GPA_REQ
------------- ----------
 128456289 ANTONY                         MICROSOFT
            1        3.7

 981672551 BOB                            MICROSOFT
            1        3.7

 453112891 ROSE                           MICROSOFT
            1        3.7


       SSN JOB_SEEKER_NAME                COMPANY_NAME
---------- ------------------------------ -------------------------
VACANCY_COUNT    GPA_REQ
------------- ----------
 721563198 IAN                            MICROSOFT
            1        3.7

 235198112 ROBERT                         MICROSOFT
            1        3.7

 761563226 CHRISTINE                      MICROSOFT
            1        3.7


24 rows selected.

/*Show me the companies where both IT and Non-IT jobs are available*/
SELECT COMPANY_NAME
FROM JOB 
WHERE UPPER(JOB_TYPE)='IT'
INTERSECT
SELECT COMPANY_NAME 
FROM JOB 
WHERE UPPER(JOB_TYPE)='NONIT';

Result -
COMPANY_NAME
-------------------------
COSCO
LIBERTY MEDIA
AMAZON
STATE FARM
QUALCOMM
TARGET CORPORATION

6 rows selected.

/*What is the average salary of every company?*/
SELECT COMPANY_NAME, AVG(SALARY) Average_Salary
FROM JOB 
GROUP BY COMPANY_NAME
HAVING AVG(SALARY) >= 20000
ORDER BY Average_Salary;

Result -
COMPANY_NAME              AVERAGE_SALARY
------------------------- --------------
TARGET CORPORATION                 20000
PRIMERICA                          50000
JOHNSON AND JOHNSON                60000
COSCO                              60000
LIBERTY MEDIA                      65000
QUALCOMM                           67500
STATE FARM                         72500
AMAZON                             82500
MESA AIRLINES                      90000
MICROSOFT                         130000
APPLE                             140000

11 rows selected.

/*What is the maximum salary for JOB_SEEKER depending on his experience*/
SELECT E.EXPERIENCED_YEARS, MAX(J.SALARY)
FROM JOB J, JOB_SEEKER S, SEARCH_FOR C, EXPERIENCED E
WHERE J.JOB_ID = C.JOB_ID	
AND J.COMPANY_NAME = C.COMPANY_NAME
AND S.SSN = C.SSN
AND S.SSN = E.ESSN
AND J.EXPERIENCE_REQ = E.EXPERIENCED_YEARS
GROUP BY E.EXPERIENCED_YEARS
HAVING MAX(J.SALARY) > 10000;

Result -
EXPERIENCED_YEARS MAX(J.SALARY)
----------------- -------------
                1         90000
                2        125000
                3        130000

/*How many Job Providers are registered/associated with the system?*/
SELECT COUNT(REG_ID) 
FROM JOB_PROVIDER;

Result -
COUNT(REG_ID)
-------------
           15

/* List of fresher candidates having Internship experience with the availalble JOB_PROVIDER companies  */
SELECT J.SSN, J.JOB_SEEKER_NAME, F.INTERNSHIP_COMPANY
FROM FRESHER F, JOB_SEEKER J 
WHERE F.FSSN=J.SSN 
AND F.INTERNSHIP_COMPANY IN (SELECT DISTINCT(COMPANY_NAME) FROM JOB);

Result -
       SSN JOB_SEEKER_NAME                INTERNSHIP_COMPANY
---------- ------------------------------ -------------------------
 887167354 ALISON                         COSCO
 453112891 ROSE                           QUALCOMM
 767334123 EMMA                           TARGET CORPORATION

/*Show me the list of available jobs in the system*/
SELECT * 
FROM JOB WHERE 
VACANCY_COUNT > 0;

Result -
    JOB_ID JOB_TYPE       REG_ID COMPANY_NAME              VACANCY_COUNT
---------- ---------- ---------- ------------------------- -------------
    SALARY    GPA_REQ EXPERIENCE_REQ POSTING_D
---------- ---------- -------------- ---------
         1 IT                101 APPLE                                 2
    140000        3.8              0 11-NOV-16

         2 IT                102 COSCO                                 1
     80000          3              2 04-NOV-16

         3 NONIT             102 COSCO                                 5
     40000          3              0 04-NOV-16


    JOB_ID JOB_TYPE       REG_ID COMPANY_NAME              VACANCY_COUNT
---------- ---------- ---------- ------------------------- -------------
    SALARY    GPA_REQ EXPERIENCE_REQ POSTING_D
---------- ---------- -------------- ---------
         4 IT                103 JOHNSON AND JOHNSON                  10
     60000        2.8              0 02-NOV-16

         5 NONIT             105 LIBERTY MEDIA                         4
     65000        2.8              0 01-NOV-16

         6 IT                106 AMAZON                                6
    125000        3.4              2 05-NOV-16


    JOB_ID JOB_TYPE       REG_ID COMPANY_NAME              VACANCY_COUNT
---------- ---------- ---------- ------------------------- -------------
    SALARY    GPA_REQ EXPERIENCE_REQ POSTING_D
---------- ---------- -------------- ---------
         7 NONIT             106 AMAZON                               10
     40000        2.5              0 06-NOV-16

         8 IT                107 MESA AIRLINES                         1
     90000        3.2              0 06-NOV-16

         9 IT                109 STATE FARM                            8
     85000        3.1              2 05-NOV-16


    JOB_ID JOB_TYPE       REG_ID COMPANY_NAME              VACANCY_COUNT
---------- ---------- ---------- ------------------------- -------------
    SALARY    GPA_REQ EXPERIENCE_REQ POSTING_D
---------- ---------- -------------- ---------
        10 NONIT             109 STATE FARM                            2
     60000          3              0 06-NOV-16

        11 IT                111 MICROSOFT                             1
    130000        3.7              3 03-NOV-16

        12                   112 PRIMERICA                             2
     50000        2.8              0 07-NOV-16


    JOB_ID JOB_TYPE       REG_ID COMPANY_NAME              VACANCY_COUNT
---------- ---------- ---------- ------------------------- -------------
    SALARY    GPA_REQ EXPERIENCE_REQ POSTING_D
---------- ---------- -------------- ---------
        13 NONIT             113 QUALCOMM                             10
     45000        2.8              0 05-NOV-16

        14 IT                113 QUALCOMM                              4
     90000        3.3              1 05-NOV-16

        15 NONIT             114 TARGET CORPORATION                   20
     20000        2.5              0 02-NOV-16


15 rows selected.