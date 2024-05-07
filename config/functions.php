<?php 

  require_once 'db.php';

  function dispaly_albums(){
    global $con;
    $query = "select * from albums";
    $result1 = mysqli_query($con,$query);
    return $result1;
  }
  
  function dispaly_songs(){
    global $con;
    $query = "select * from song";
    $result2 = mysqli_query($con,$query);
    return $result2;
  }

  function dispaly_platform(){
    global $con;
    $query = "select * from platform";
    $result3 = mysqli_query($con,$query);
    return $result3;
  }

  function dispaly_artists(){
    global $con;
    $query = "select * from artists";
    $result4 = mysqli_query($con,$query);
    return $result4;
  }

  function dispaly_release_group(){
    global $con;
    $query = "select * from release_group";
    $result5 = mysqli_query($con,$query);
    return $result5;
  }

  function getsongscount(){
    global $con;
    $query = "SELECT * FROM song";
    $songg = $con->query($query);
    $rows1= mysqli_num_rows($songg);
    return $rows1;
  }

  function getreleasegroupscount(){
    global $con;
    $query = "SELECT * FROM release_group";
    $rgpp = $con->query($query);
    $rows2= mysqli_num_rows($rgpp);
    return $rows2;
  }

  function getalbumscount(){
    global $con;
    $query = "SELECT * FROM albums";
    $albumm = $con->query($query);
    $rows3= mysqli_num_rows($albumm);
    return $rows3;
  }

  function getartistscount(){
    global $con;
    $query = "SELECT * FROM artists";
    $artistt = $con->query($query);
    $rows4= mysqli_num_rows($artistt);
    return $rows4;
  }

  function getplatformcount(){
    global $con;
    $query = "SELECT * FROM platform";
    $platformm = $con->query($query);
    $rows5= mysqli_num_rows($platformm);
    return $rows5;
  }

  function delete_song($songID) {
    global $con; // Assuming $con is your database connection variable
    
    $query = "DELETE FROM song WHERE song_id = ?";
    
    $stmt = mysqli_prepare($con, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $songID);
        
        if (mysqli_stmt_execute($stmt)) {
            // Song deleted successfully
            mysqli_stmt_close($stmt);
            return true;
        } else {
            // Error deleting song
            mysqli_stmt_close($stmt);
            return false;
        }
    } else {
        // Error in preparing the statement
        return false;
    }
  }


    function delete_albums($AlbumID) {
      global $con; // Assuming $con is your database connection variable
      
      $query = "DELETE FROM albums WHERE album_id = ?";
      
      $stmt = mysqli_prepare($con, $query);
      
      if ($stmt) {
          mysqli_stmt_bind_param($stmt, "i", $AlbumID);
          
          if (mysqli_stmt_execute($stmt)) {
              // Song deleted successfully
              mysqli_stmt_close($stmt);
              return true;
          } else {
              // Error deleting song
              mysqli_stmt_close($stmt);
              return false;
          }
      } else {
          // Error in preparing the statement
          return false;
      }
    }

    function delete_platforms($PlatformID) {
      global $con; // Assuming $con is your database connection variable
      
      $query = "DELETE FROM platform WHERE platform_id = ?";
      
      $stmt = mysqli_prepare($con, $query);
      
      if ($stmt) {
          mysqli_stmt_bind_param($stmt, "i", $PlatformID);
          
          if (mysqli_stmt_execute($stmt)) {
              // Song deleted successfully
              mysqli_stmt_close($stmt);
              return true;
          } else {
              // Error deleting song
              mysqli_stmt_close($stmt);
              return false;
          }
      } else {
          // Error in preparing the statement
          return false;
      }
    }

    function delete_artist($ArtistID) {
      global $con; // Assuming $con is your database connection variable
      
      $query = "DELETE FROM artists WHERE artist_id = ?";
      
      $stmt = mysqli_prepare($con, $query);
      
      if ($stmt) {
          mysqli_stmt_bind_param($stmt, "i", $ArtistID);
          
          if (mysqli_stmt_execute($stmt)) {
              // Song deleted successfully
              mysqli_stmt_close($stmt);
              return true;
          } else {
              // Error deleting song
              mysqli_stmt_close($stmt);
              return false;
          }
      } else {
          // Error in preparing the statement
          return false;
      }
    }

    function delete_release($ReleaseID) {
      global $con; // Assuming $con is your database connection variable
      
      $query = "DELETE FROM release_group WHERE release_id = ?";
      
      $stmt = mysqli_prepare($con, $query);
      
      if ($stmt) {
          mysqli_stmt_bind_param($stmt, "i", $ReleaseID);
          
          if (mysqli_stmt_execute($stmt)) {
              // Song deleted successfully
              mysqli_stmt_close($stmt);
              return true;
          } else {
              // Error deleting song
              mysqli_stmt_close($stmt);
              return false;
          }
      } else {
          // Error in preparing the statement
          return false;
      }
    }

    function get_album_details($albumID) {
      global $con; // Assuming $con is your database connection variable
      
      $query = "SELECT * FROM albums WHERE album_id = ?";
      
      $stmt = mysqli_prepare($con, $query);
      
      if ($stmt) {
          mysqli_stmt_bind_param($stmt, "i", $albumID);
          
          mysqli_stmt_execute($stmt);
          
          $result = mysqli_stmt_get_result($stmt);
          $albumDetails = mysqli_fetch_assoc($result);
          
          mysqli_stmt_close($stmt);
          
          return $albumDetails;
      } else {
          // Error in preparing the statement
          return null;
      }
    }

    function update_album($albumID, $newAlbumTitle, $newReleaseDate, $newArtistID) {
      global $con; // Assuming $con is your database connection variable
      
      $query = "UPDATE albums SET album_title = ?, release_date = ?, artist_id = ? WHERE album_id = ?";
      
      $stmt = mysqli_prepare($con, $query);
      
      if ($stmt) {
          mysqli_stmt_bind_param($stmt, "ssii", $newAlbumTitle, $newReleaseDate, $newArtistID, $albumID);
          
          if (mysqli_stmt_execute($stmt)) {
              mysqli_stmt_close($stmt);
              return true;
          } else {
              mysqli_stmt_close($stmt);
              return false;
          }
      } else {
          // Error in preparing the statement
          return false;
      }
    }

    function search_albums($searchTerm) {
      global $con;
      $query = "SELECT * FROM albums WHERE album_title LIKE '%$searchTerm%'"; // Modify this query as needed
      $result = mysqli_query($con, $query);
      return $result;
    }
  
    function search_songs($searchTerm) {
      global $con;
      $query = "SELECT * FROM song WHERE song_title LIKE '%$searchTerm%'";
      $result = mysqli_query($con, $query);
      return $result;
    }

    function search_release_groups($searchTerm) {
      global $con;
      $query = "SELECT * FROM release_group WHERE re_name LIKE '%$searchTerm%'";
      $result = mysqli_query($con, $query);
      return $result;
    }


  function search_artists($searchTerm) {
    global $con;
    $query = "SELECT * FROM artists WHERE artist_name LIKE '%$searchTerm%'";
    $result = mysqli_query($con, $query);
    return $result;
  }

  function search_platforms($searchTerm) {
    global $con;
    $query = "SELECT * FROM platform WHERE platform_name LIKE '%$searchTerm%'"; // Modify this query as needed
    $result = mysqli_query($con, $query);
    return $result;
  }

  function filter_albums($filterOption) {
    global $con;
    $query = "";

    switch ($filterOption) {
        case 'recent':
            $query = "SELECT * FROM albums ORDER BY release_date DESC"; // Modify this query as needed
            break;
        case 'old':
            $query = "SELECT * FROM albums ORDER BY release_date ASC"; // Modify this query as needed
            break;
        default:
            $query = "SELECT * FROM albums"; // Default query to fetch all albums
            break;
    }

    $result = mysqli_query($con, $query);
    return $result;
  }

?>