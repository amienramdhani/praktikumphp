<!DOCTYPE html>
<html>
  <head>
    <title></title>
  </head>
  <body>

      <h1>Selamat Datang Di Aplikasi Financing</h1>
      <form method="post" action="<?= site_url('login/aksi_login');?>">
          <table>
              <tr>
                  <td>Username</td>
                  <td><input type="text" name="username"></td>
              </tr>
                  <tr>
                      <td>Password</td>
                      <td><input type="password" name="password"></td>
                  </tr>
                  <tr>
                      <td><input type="submit" value="Login"></td>
                 </tr>
          </table>


      </form>

  </body>
</html>
