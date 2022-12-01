<?php
function totalJokes($pdo) {
  $query = query($pdo, 'SELECT COUNT(*) FROM `joke`');

  $row = $query->fetch();

  return $row[0];
}
function getJoke($pdo, $id) {
  $parameters = [':id'=>$id];

  $query = query($pdo, 'SELECT * FROM `joke` WHERE `id` = :id', $parameters);


  return $query->fetch();
}

// function insertJoke($pdo, $joketext, $authorid) {
//   $query = 'INSERT INTO `joke` (`joketext`, `jokedate`, `authorid`) VALUES (:joketext, CURDATE(), :authorid)';
  
//   $parameters = [':joketext' => $joketext, ':authorid' => $authorid];
  
//   query($pdo, $query, $parameters);
// }
function insertJoke($pdo, $fields) {
  $query = 'INSERT INTO `joke` (';
  
  foreach ($fields as $key => $value) {
    $query .= '`' . $key . '`,';
  }

  $query = rtrim($query, ',');

  $query .= ') VALUES (';

  foreach ($fields as $key => $value) {
    $query .= ':' . $key .',';
  }

  $query = rtrim($query, ',');
  $query .= ')';

  // foreach($fields as $key => $value) {
  //   if($value instanceof DateTime) {
  //     $fields[$key] = $value->format('Y-m-d H:i:s');
  //   }
  // } -> 아래 함수로 집어 넣었음
  $fields = processDates($fields);

  query($pdo, $query, $fields);
}


// function updateJoke($pdo, $jokeid, $joketext, $authorid) {
//   $parameters = [':joketext' => $joketext, ':authorid' => $authorid, ':id' => $jokeid];

//   query($pdo, 'UPDATE `joke` SET `authorid` = :authorid, `joketext`= :joketext WHERE `id` = :id', $parameters);
// }
function updateJoke($pdo, $fields) {
  $query = ' UPDATE `joke` SET ';

  foreach ($fields as $key => $value) {
    $query .= '`' . $key . '` = :' . $key .',';
  }

  $query = rtrim($query, ',');

  $query .= ' WHERE `id` = :primaryKey';

  $fields = processDates($fields);

  $fields['primaryKey'] = $fields['id'];
  
  query($pdo, $query, $fields);
}

function deleteJoke($pdo, $id) {
  $parameters = [':id' => $id];

  query($pdo, 'DELETE FROM `joke` WHERE `id` = :id', $parameters);
}

function alljokes($pdo) {
  $jokes = query($pdo, 'SELECT `joke`.`id`, `joketext`, `jokedate`, `name`, `email` FROM `joke` INNER JOIN `author` ON `authorid` = `author`.`id`');

  return $jokes->fetchAll();
}
function allprogramming($pdo) {
  $pros = query($pdo, 'SELECT `prog_id`, `prog_title`, `prog_text`, `prog_date`, `author_id` FROM `programming`');

  return $pros->fetchAll();
}

function allAuthors($pdo) {
  $authors = query($pdo, 'SELECT * FROM `author`');
  return $authors -> fetchAll();
}

function deleteAuthor($pdo, $id) {
  $parameters = [':id' => $id];

  query($pdo, 'DELETE FROM `author` WHERE `id` = :id', $parameters);
}
function insertAuthors($pdo, $fields) {
  $query = 'INSERT INTO `author` (';
  
  foreach ($fields as $key => $value) {
    $query .= '`' . $key . '`,';
  }

  $query = rtrim($query, ',');

  $query .= ') VALUES (';

  foreach ($fields as $key => $value) {
    $query .= ':' . $key .',';
  }

  $query = rtrim($query, ',');
  $query .= ')';


  $fields = processDates($fields);

  query($pdo, $query, $fields);
}





function query($pdo, $sql, $parameters =[]) {
  $query = $pdo->prepare($sql);

  $query->execute($parameters);

  return $query;
}

function total($pdo, $table) {
  $query = query($pdo, 'SELECT COUNT(*) FROM `' .$table. '`');
  $row = $query->fetch();
  return $row[0];
}

function findById($pdo, $table, $primaryKey, $value) {
  $query = 'SELECT * FROM `' .$table .'` WHERE `' .$primaryKey . '` = :value';

  $parameters = [
    'value' => $value
  ];

  $query = query($pdo, $query, $parameters);
  return $query->fetch();
}



function insert($pdo, $table, $fields) {
  $query = 'INSERT INTO `' . $table . '` (';

  foreach($fields as $key => $value) {
    $query .= '`' .$key . '`,' ;
  }

  $query = rtrim($query, ',');
  $query .= ') VALUES (' ;

  foreach ($fields as $key => $value) {
    $query .= ':' . $key . ',';
  }

  $query = rtrim($query, ',');
  $query .= ')';

  $fields = processDates($fields);
  query($pdo, $query, $fields);
}


function update($pdo, $table, $primaryKey, $fields) {
  $query = 'UPDATE `' . $table . '` SET ';

  foreach($fields as $key => $value) {
    $query .= '`' .$key . '` = :' .$key . ',' ;
  }

  $query = rtrim($query, ',');
  $query .= ' WHERE `' .$primaryKey . '` = :primaryKey';

  $fields['primaryKey'] = $fields['id'];

  $fields = processDates($fields);

  query($pdo, $query, $fields);
}

function delete($pdo, $table, $primaryKey, $id) {
  $parameters = ['id' => $id];

  query($pdo, 'DELETE FROM `'. $table . '` WHERE `'. $primaryKey . '` = :id', $parameters);
}


function findAll($pdo, $table) {
  $result = query($pdo, 'SELECT * FROM `' . $table. '`');

  return $result->fetchAll();
}


function processDates($fields) {
  foreach($fields as $key => $value) {
    if($value instanceof DateTime) {
      $fields[$key] = $value->format('Y-m-d H:i:s');
    }
  }
  
  return $fields;
}

function save($pdo, $table, $primaryKey, $record) {
  try {
    if ($record[$primaryKey] == '') {
      $record[$primaryKey] = null;
    }
    insert($pdo, $table, $record);
  }
  catch (PDOException $e) {
    update($pdo, $table, $primaryKey, $record);
  }
}
