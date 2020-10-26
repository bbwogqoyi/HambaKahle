<!DOCTYPE html>
<html lang="en">
<?php
$GLOBALS['active_nav_item'] = 'assets_dashboard';
require_once(dirname(__DIR__) . "../../auth/authorization.php");
authorize('employeeID', '../index.php');

//import database utils
require_once(dirname(__DIR__) . "../../common/utils.php");

function buildLicenceList($licenceList) {
  $html = "";
  foreach($licenceList as $entry) {
    $html = $html . '<li>'.$entry.'</li>';
  }
  return '<ul class="list-disc ml-2">'.$html.'</ul>';
}

function queryDrivers() {
   // issue query instructions
  if( isset($_REQUEST['searchText']) ) {
    $searchText = $_REQUEST['searchText'];

    $query = 
      "SELECT d.*, GROUP_CONCAT(l.classification) as licenceList
      from driverlicense dl, license l, driver d
      where dl.driverID = d.driverID
      and l.licenseCode = dl.licenseCode
      group by dl.driverID 
      having (
        concat_ws(' ', d.firstName, d.lastName) LIKE '%$searchText%'
        or d.hometown LIKE '%$searchText%'
      ) LIMIT 20";
  } else {
    $query = 
      "SELECT d.*, GROUP_CONCAT(l.classification) as licenceList
      from driverlicense dl, license l, driver d
      where dl.driverID = d.driverID
      and l.licenseCode = dl.licenseCode
      group by dl.driverID 
      limit 30";
  }
  
  $result = executeQuery($query);
  return $result;
}

?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/tailwind.css" />
  <link rel="stylesheet" href="../../css/custom.css" />
  <title>Assets</title>
</head>
<body class="antialiased bg-gray-200">
   <!-- Top Navbar -->
   <?php
    require_once("../../component_partials/admin.topbar.nav.php");
  ?>

  <!-- Page Content-->
  <div class="mt-16 mb-12 py-8 px-6 mx-auto bg-white flex flex-wrap items-center w-full lg:w-4/5">
    <!-- Assets Page Navbar -->
    <div class="">
      <nav class="flex flex-col sm:flex-row">
        <a href="./index.assets.php" class="text-gray-600 py-4 px-6 block hover:text-indigo-500 hover:font-semibold  focus:outline-none"  >
            Vehicles
        </a>
        <a href="./depots.php" class="text-gray-600 py-4 px-6 block hover:text-indigo-500 hover:font-semibold focus:outline-none" >
            Depots
        </a>
        <a href="./employees.php"  class="text-gray-600 py-4 px-6 block hover:text-indigo-500 hover:font-semibold focus:outline-none" >
            Employees
        </a>
        <a href="./drivers.php"  class="text-indigo-400 py-4 px-6 block hover:text-indigo-700 hover:font-semibold focus:outline-none  
            border-b-2 font-medium border-indigo-500" >
            Drivers
        </a>
      </nav>
    </div>

    <!-- Searchbar + Button -->
    <div class="mt-8 flex justify-between w-full items-center mb-10"> 
      <div class="w-1/3">
        <div class="relative">
          <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
            <svg class="h-6 w-6 text-gray-600"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
          </span>
          <form id="searchForm" action='./drivers.php' method="GET" >        
            <input type="text" id="searchText" name="searchText" oninput="searchTextChange()"
              <?php echo (isset($_REQUEST['searchText']) ? ( 'value="'.$_REQUEST['searchText'].'"') : "" );?>
              class="py-3 pl-10 w-full text-lg bg-white border border-grey-400 rounded-md text-gray-800 
              placeholder-gray-500  shadow"
              placeholder="Search" />
            <span id="searchBtn" class="absolute inset-y-0 right-0 pl-3 hidden items-center">
              <button type="submit" onclick="search();" class="bg-indigo-400 hover:bg-indigo-600 text-white font-bold py-2 px-6 mr-2 rounded">
                Go
              </button>
            </span>
          </form>
        </div>
      </div>
      
      <a href="../driver/add.driver.php"
          class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-4 px-10 rounded">
        Add New Driver
      </a>
    </div>

    <!-- dynamic content -->
    <table class="table-fixed text-left w-full">
      <thead class="bg-gray-200">
        <tr>
          <th class="w-1/6 px-4 py-2">Name</th>
          <th class="w-1/6 px-4 py-2">Licences</th>
          <th class="w-1/6 px-4 py-2">Town</th>
          <th class="w-1/6 px-4 py-2">Date of Birth</th>
          <th class="w-1/6 px-4 py-2">Contact Number</th>
          <th class="w-1/6 px-4 py-2">Email</th>
        </tr>
      </thead>
      <tbody class="text-gray-700">
        <?php
          $result = queryDrivers();
          if($result==null || mysqli_num_rows($result)<1) 
          {
            echo 
            '<tr class="text-2xl text-gray-600 text-center">
            <td colspan="10">No Drivers</td>
            </tr>';
          }
        ?>
        <?php
          $row_index=0;
          while($result!=null && $row = mysqli_fetch_assoc($result))
          {
            echo '
              <tr>
                <td class="flex items-center border px-4 py-4">
                  <a href="../driver/view.driver.php?driverID='. $row["driverID"] .'" class="lg:ml-4  flex items-center justify-start lg:mb-0 mb-4 pointer-cursor">
                    <img class="rounded-full w-12 h-12 mr-4 border-2 border-transparent hover:border-indigo-800"
                      src="https://images.unsplash.com/photo-1509305717900-84f40e786d82?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.25&w=144&h=144&q=80"
                      alt="Nkosinathi Nkomo">
                      <p class="text-indigo-500 font-medium hover:text-indigo-600 hover:border-b-2 border-indigo-600" >
                      '. $row["firstName"] .' '. $row["lastName"] . '
                      </p>
                  </a>
                </td>
                <td class="border px-4 py-2">
                  '. buildLicenceList( explode(",", $row["licenceList"]) ) .'
                </td>
                <td class="border px-4 py-2">'. $row["hometown"] .'</td>
                <td class="border px-4 py-2">'. $row["dateOFBirth"] .'</td>
                <td class="border px-4 py-2">' .$row["contactNumber"] .'</td>
                <td class="border px-4 py-4">'. $row["email"] . '</td>
              </tr>
            ';
          }
          ?>
      </tbody>
    </table>

  </div>
</body>
</html>