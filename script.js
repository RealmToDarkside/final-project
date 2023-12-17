function toggleForms() {
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');
  
    loginForm.style.display = loginForm.style.display === 'none' ? 'block' : 'none';
    registerForm.style.display = registerForm.style.display === 'none' ? 'block' : 'none';
  }
  
  function login(event) {
    event.preventDefault();
    const username = document.getElementById('login-username').value;
    const password = document.getElementById('login-password').value;
  
    const storedUser = JSON.parse(localStorage.getItem(username));
  
    if (storedUser && storedUser.password === password) {
        window.location.href = 'homepage.php';
    } else {
      alert('Invalid username or password.');
    }
  }
  
  function register(event) {
    event.preventDefault();
    const username = document.getElementById('register-username').value;
    const password = document.getElementById('register-password').value;
  
    const storedUser = JSON.parse(localStorage.getItem(username));
  
    if (storedUser) {
      alert('Username already exists. Please choose a different one.');
    } else {
      const newUser = { username, password };
      localStorage.setItem(username, JSON.stringify(newUser));
      alert('Succesful Register')
    
    }
  }
  
  function showDashboard(username) {
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');
    const dashboard = document.getElementById('dashboard');
    const userWelcome = document.getElementById('user-welcome');
  
    loginForm.style.display = 'none';
    registerForm.style.display = 'none';
    dashboard.style.display = 'block';
    userWelcome.textContent = username;
  }
  
  function logout(){
    window.location.href = 'login.php';
    alert('Thank You For Using My Website')
    
  }
  
  function showRegisterForm() {
    document.getElementById('login-form').style.display = 'none';
    document.getElementById('register-form').style.display = 'block';
  }
  
  function showLoginForm() {
    document.getElementById('login-form').style.display = 'block';
    document.getElementById('register-form').style.display = 'none';
  }
