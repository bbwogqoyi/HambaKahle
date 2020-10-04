<?php
$test_data = array(
  0 => array(
    "name" => "Andiswa Qwaba",
    "address" => "Hamilton Building, Prince Alfred St, Grahamstown, 6139",
    "start_date" => "01 November 2020",
    "end_date" => "31 November 2020",
    "status" => "Pending"
  ),
  1 => array(
    "name" => "Nkosinathi Nkomo",
    "address" => "Africa Media Matrix building, Upper Prince Alfred street, Rhodes University, Grahamstown, 6140",
    "start_date" => "01 November 2020",
    "end_date" => "31 November 2020",
    "status" => "Pending"
  )
);

function renderBookingEntry($bookingID, $name, $address, $start_date, $end_date, $status) {
  return '
  <tr>
    <td class="border px-4 py-2">'.$name.'</td>
    <td class="border px-4 py-2">'.$address.'</td>
    <td class="border px-4 py-2">'.$start_date.'</td>
    <td class="border px-4 py-2">'.$end_date.'</td>
    <td class="border px-4 py-2">'.$status.'</td>
    <td class="border py-2">
      <span class="inline-flex justify-evenly w-full">
        <!-- Edit button -->
        <a href="./booking/admin.booking.overview.php?id='. $bookingID .'">
          <span class="flex flex-col items-center justify-items-center">
            <svg alt="Edit" class="text-blue-300 hover:text-blue-700 h-6 w-6 m-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
            </svg>
            <p class="font-thin text-sm -mt-1">Edit</p> 
          </span> 
        </a>
        <!-- Delete button -->
        <a href="#">
          <span class="flex flex-col items-center justify-items-center">
            <svg class="text-red-300 hover:text-red-700 h-6 w-6 m-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <p class="font-thin text-sm -mt-1">Delete</p> 
          </span> 
        </a>
      </span>
    </td>
  </tr>
  '
;}

$table = 
  '
    <!-- Content Table -->
    <table class="table-auto text-left w-full">
      <thead class="bg-gray-200">
        <tr>
          <th class="w-1 px-4 py-2"></th>
          <th class="w-1/6 px-4 py-2">Name</th>
          <th class="w-1/6 px-4 py-2">Address</th>
          <th class="w-1/6 px-4 py-2">Start Date</th>
          <th class="w-1/6 px-4 py-2">End Date</th>
          <th class="w-1/6 px-4 py-2">Status</th>
          <th class="w-1/12 px-4 py-2">Actions</th>
        </tr>
      </thead>
      <tbody class="text-gray-700">
        <tr>
          <td class="border px-2"><input type="radio" class="form-radio text-indigo-600" name="radio-colors" value="1"></td>
          <td class="border px-4 py-2">Andiswa Qwaba</td>
          <td class="border px-4 py-2">
            Hamilton Building, Prince Alfred St, Grahamstown, 6139
          </td>
          <td class="border px-4 py-2">01 November 2020</td>
          <td class="border px-4 py-2">31 November 2020</td>
          <td class="border px-4 py-2">Pending</td>
          <td class="border py-2">
            <span class="inline-flex">
              <!-- Edit button -->
              <a href="#">
                <svg alt="Edit" class="text-blue-300 hover:text-blue-700 h-6 w-6 m-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
              </a>
              <!-- submit button -->
              <a href="#">
                <svg  class="fill-current text-green-400 hover:text-green-700 h-6 w-6 m-2"  viewBox="0 0 512 512" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M506.955 1.314a9.999 9.999 0 00-10.045.078L313.656 109.756c-4.754 2.811-6.329 8.943-3.518 13.697 2.81 4.753 8.942 6.328 13.697 3.518l131.482-77.749-244.906 254.113-121.808-37.266 158.965-94c4.754-2.812 6.329-8.944 3.518-13.698-2.81-4.753-8.943-6.33-13.697-3.518L58.91 260.392a10 10 0 002.164 18.171l145.469 44.504L270.72 439.88c.067.121.136.223.207.314 1.071 1.786 2.676 3.245 4.678 4.087a9.99 9.99 0 0010.869-2.065l73.794-72.12 138.806 42.466A10 10 0 00512 403V10a10 10 0 00-5.045-8.686zM271.265 329.23a10.005 10.005 0 00-1.779 5.694v61.171l-43.823-79.765 193.921-201.21-148.319 214.11zm18.221 82.079v-62.867l48.99 14.988-48.99 47.879zM492 389.483l-196.499-60.116L492 45.704v343.779z"/>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M164.423 347.577c-3.906-3.905-10.236-3.905-14.143 0l-93.352 93.352c-3.905 3.905-3.905 10.237 0 14.143C58.882 457.024 61.441 458 64 458s5.118-.976 7.071-2.929l93.352-93.352c3.905-3.904 3.905-10.236 0-14.142zM40.071 471.928c-3.906-3.903-10.236-3.903-14.142.001l-23 23c-3.905 3.905-3.905 10.237 0 14.143C4.882 511.024 7.441 512 10 512s5.118-.977 7.071-2.929l23-23c3.905-3.905 3.905-10.237 0-14.143zM142.649 494.34a10.072 10.072 0 00-7.069-2.93c-2.641 0-5.21 1.07-7.07 2.93a10.058 10.058 0 00-2.93 7.07c0 2.63 1.069 5.21 2.93 7.07 1.86 1.86 4.44 2.93 7.07 2.93s5.21-1.07 7.069-2.93a10.077 10.077 0 002.931-7.07c0-2.64-1.07-5.21-2.931-7.07zM217.051 419.935c-3.903-3.905-10.233-3.905-14.142 0l-49.446 49.445c-3.905 3.905-3.905 10.237 0 14.142 1.953 1.953 4.512 2.929 7.071 2.929s5.118-.977 7.071-2.929l49.446-49.445c3.905-3.905 3.905-10.237 0-14.142zM387.704 416.139c-3.906-3.904-10.236-3.904-14.142 0l-49.58 49.58c-3.905 3.905-3.905 10.237 0 14.143 1.953 1.952 4.512 2.929 7.071 2.929s5.118-.977 7.071-2.929l49.58-49.58c3.905-3.905 3.905-10.237 0-14.143zM283.5 136.31c-1.86-1.86-4.44-2.93-7.07-2.93s-5.21 1.07-7.07 2.93a10.086 10.086 0 00-2.93 7.08c0 2.63 1.07 5.2 2.93 7.06 1.86 1.87 4.44 2.93 7.07 2.93s5.21-1.06 7.07-2.93a10.057 10.057 0 002.93-7.06c0-2.64-1.07-5.22-2.93-7.08z"/>
                </svg>
              </a>
              <!-- Delete button -->
              <a href="#">
                <svg class="text-red-300 hover:text-red-700 h-6 w-6 m-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
              </a>
            </span>
          </td>
        </tr>
      </tbody>
    </table>
  ';

//import database credentials
require_once(dirname(__DIR__) . "../../common/db.config.php");

function getBookings(){
  //connect to the database 
  $conn = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE)
         or die("Sorry , could not connect ot the database!");

  //issue query instructions
  $query = "
    select c.firstName, c.lastName, b.* 
    from clients c, (select * from booking) b
    where b.clientID = c.clientID
    limit 20
  ";  
  $result = mysqli_query($conn, $query) or die("Error on query!");

  //disconnect 
  mysqli_close($conn);
  return $result;
}


?>

<table class="table-fixed text-left w-full">
  <thead class="bg-gray-200">
    <tr>
      <th class="w-1/6 px-4 py-2">Name</th>
      <th class="w-1/6 px-4 py-2">Pick-up Address</th>
      <th class="w-1/6 px-4 py-2">Start Date</th>
      <th class="w-1/6 px-4 py-2">End Date</th>
      <th class="w-1/6 px-4 py-2">Status</th>
      <th class="w-1/12 px-4 py-2">Actions</th>
    </tr>
  </thead>
  <tbody class="text-gray-700">
    <?php
      $result = getBookings();
      if($result==null || mysqli_num_rows($result)<1) 
      {
        echo 
        '<tr class="text-2xl text-gray-600 text-center">
        <td colspan="6">No Bookings</td>
        </tr>';
      }

      while ($result!=null && $model = mysqli_fetch_assoc($result)) {
        echo renderBookingEntry(
          $model["bookingID"],
          $model["firstName"] . " " . $model["lastName"], 
          $model["initialCollectionPoint"], 
          $model["startDate"],
          $model["endDate"],
          $model["status"] 
        );
      }

      // foreach($test_data as $model) {
      //   echo renderBookingEntry(
      //     $model["name"], $model["address"], $model["start_date"],$model["end_date"], $model["status"] 
      //   );
      // }
    ?>
  </tbody>
</table>
      