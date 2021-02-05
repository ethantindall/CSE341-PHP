<?php

session_start();

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if ($action == NULL){
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
 }


 $_SESSION['facts'] = '<ul>
                        <li>A goldfish has a 3 second memory span.</li>
                        <li>George Washington died before dinosaurs were discovered.</li>
                        <li>The Star Wars cartoons are better than the movies. (FACT)</li>
                        <li>Saint Nicholas punched a dude at the Council of Nicea.</li>
                    </ul>';

$_SESSION["about"] = '<ul>
                        <li>Running</li>
                        <li>Writing Music</li>
                        <li>Playing Piano</li>
                        <li>Playing Bagpipes</li>
                        <li>Coding</li>
                        <li>Eating Pizza</li>
                        <li>Eating Meat</li>
                    </ul>';


 switch ($action){
    case 'assignments': 
        include 'homepage/assignments.php';
        break;
    default:
        include 'homepage/homepage.php';
        break;
    }
    



$_SESSION["assignmentList"] = '
<<<<<<< HEAD
                        <a href="/wk3/index.php"><li class="drop-selector"><h3>Week 3</h3></li></a>
                        <a href="/wk5-team/results.php"><li class="drop-selector"><h3>Week 5 - Team</h3></li></a>
                        <a href="/db-project/index.php"><li class="drop-selector"><h3>Database Project</h3></li></a>
=======
                        <a href="/CSE341-PHP/web/wk3/index.php"><li class="drop-selector"><h3>Week 3</h3></li></a>
                        <a href="/web/wk3/index.php"><li class="drop-selector"><h3>Week 4</h3></li></a>
                        <a href="/CSE341-PHP/web/wk5-team/index.php"><li class="drop-selector"><h3>Week 5 - Team</h3></li></a>
                        <a href="https://blooming-ocean-40478.herokuapp.com/wk3/index.php"><li class="drop-selector"><h3>Week 6</h3></li></a>
>>>>>>> 6eb1972f5f44c8c5381908a029aa962ce9d127b5

'


?>