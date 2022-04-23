<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">
    <link href="" rel="stylesheet">
    <title>Login</title>


</head>

<body>
    <div class="flex items-center justify-center">
        <div class="w-full max-w-md">
            <form id="form" method="POST" action="/api/auth/login" class="bg-white shadow-lg rounded px-12 pt-6 pb-8 mb-4">
                @csrf
                <div class="text-gray-800 text-2xl flex justify-center border-b-2 py-2 mb-4">
                    Login
                </div>
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 text-sm font-normal mb-2">
                        Email
                    </label>
                    <input name="email" id="email" type="email" value="walid@gmail.com" placeholder="Email"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-normal mb-2">
                        Password
                    </label>
                    <input type="password" id="password" value="1234" placeholder="Password" name="password"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" "
              />
            </div>
            <div class="  flex items-center justify-between">
                    <button
                        class="px-4 py-2 rounded text-white inline-block shadow-lg bg-blue-500 hover:bg-blue-600 focus:bg-blue-700"
                        type="submit">Sign In</button>
                    <a class="inline-block align-baseline font-normal text-sm text-blue-500 hover:text-blue-800"
                        href="#">
                        Forgot Password?
                    </a>
                </div>
            </form>
        </div>
    </div>

</body>
<script>
    const form = document.querySelector("#form");
    const email = document.querySelector("#email");
    const password = document.querySelector("#password");

    
    form.addEventListener("submit", (e) => {
        e.preventDefault();
        if (email.value === "" || password.value === "") {
        } else {
            
            fetch("http://127.0.0.1:8000/api/auth/login", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    email: email.value,
                    password: password.value,
                }),
            })
                .then((res) => res.json())
                .then((data) => {
                    if (data.status === "success") {
                      console.log(data.data);
                        // window.location.href = "/";
                    } else {
                        alert(data.message);
                    }
                });
        }
    });
</script>

</html>
