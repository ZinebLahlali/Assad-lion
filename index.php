<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Virtual Zoo – Login / Signup</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-white text-white">

  <!-- LOGIN PAGE -->
  <section id="login" class="min-h-screen flex items-center justify-center bg-[url('https://i.pinimg.com/1200x/f8/69/83/f8698331128b8f5c6052af7c309765fa.jpg')] bg-cover bg-center">
    <div class="w-full max-w-md bg-black/60 backdrop-blur-md rounded-3xl p-8 shadow-2xl">
      <h1 class="text-3xl font-bold text-center">Enter the Wild</h1>
      <p class="text-center text-gray-300 mt-2">Experience the roar of the savanna.</p>

      <form class="mt-6 space-y-4">
        <input type="email" placeholder="Enter your email" class="w-full px-4 py-3 rounded-xl bg-white/10 focus:outline-none" />
        <input type="password" placeholder="Enter your password" class="w-full px-4 py-3 rounded-xl bg-white/10 focus:outline-none" />

        <button type="submit" class="w-full py-3 rounded-xl bg-yellow-500 text-black font-bold">LOG IN →</button>
      </form>

      <p class="text-center text-sm text-gray-300 mt-6">
        Don’t have an account?
        <button onclick="showSignup()" class="text-yellow-400 font-semibold">Join the Pride</button>
      </p>
    </div>
  </section>

  <!-- SIGNUP PAGE -->
  <section id="signup" class="hidden min-h-screen flex items-center justify-center bg-[url('https://i.pinimg.com/736x/36/04/62/360462e73928a7f312f53f6888b59c11.jpg')] bg-cover bg-center">
    <div class="w-full max-w-md bg-black/60 backdrop-blur-md rounded-3xl p-8 shadow-2xl">
      <h1 class="text-3xl font-bold">Start Your <span class="text-yellow-400">Safari</span></h1>
      <p class="text-gray-300 mt-2">Sign up to explore the CAN 2025 Virtual Zoo.</p>

      <form class="mt-6 space-y-4">
        <input type="email" placeholder="Email" class="w-full px-4 py-3 rounded-xl bg-white/10 focus:outline-none" />
        <input type="password" placeholder="Password" class="w-full px-4 py-3 rounded-xl bg-white/10 focus:outline-none" />
        <input type="password" placeholder="Confirm Password" class="w-full px-4 py-3 rounded-xl bg-white/10 focus:outline-none" />
        <select class="w-full px-4 py-3 rounded-xl bg-white/10 focus:outline-none">
            <option class="text-black" value="guide">Guide</option>
            <option  class="text-black" value="visiteur" >Visiteur</option>
        </select>

        <button type="submit" class="w-full py-3 rounded-xl bg-yellow-500 text-black font-bold">Create Account</button>
      </form>

      <p class="text-center text-sm text-gray-300 mt-6">
        Already a member?
        <button onclick="showLogin()" class="text-yellow-400 font-semibold">Log In</button>
      </p>
    </div>
  </section>

  <script src="script.js"></script>
   
</body>
</html>
