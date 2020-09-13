<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/tailwind.css" />
  <link rel="stylesheet" href="../css/custom.css" />
  <title>Log In</title>
</head>

<body class="bg-grey-100 h-screen font-sans">
  <div class="container mx-auto h-full flex justify-center items-center">
    <div class="w-2/3 lg:w-1/3">
      <h1 class="font-light text-4xl mb-6 text-center">Log In</h1>
      <div class="border-blue-500 p-8 border-t-8 bg-white mb-6 rounded-lg shadow-lg">
        <div class="mb-4">
          <label class="font-bold text-grey-darker block mb-2">
            Username or Email
          </label>
          <input type="text"
            class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow"
            placeholder="n.nkomo@campus.ru.ac.za" />
        </div>
        <div class="mb-4">
          <label class="font-bold text-grey-darker block mb-2">
            Password
          </label>
          <input type="password"
            class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow"
            placeholder="Password" />
        </div>
        <div class="flex items-center justify-between">
          <div class="inline-flex">
            <button class="bg-blue-600 hover:bg-teal text-white font-bold py-2 px-4 rounded">
              Login
            </button>
            <button class="bg-red-600 ml-2 hover:bg-teal text-white font-bold py-2 px-4 rounded">
                Cancel
            </button>
          </div>

          <a class="no-underline inline-block align-baseline font-bold text-sm text-blue hover:text-blue-dark float-right" href="#">
              Forgot Password?
          </a>
        </div>
      </div>
      <div class="text-center">
        <p class="text-grey-dark text-sm">Don't have an account? <a href="#" class="no-underline text-blue font-bold">Create an Account</a>.</p>
    </div>
    </div>
  </div>
</body>

</html>