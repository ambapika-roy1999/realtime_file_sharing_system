<html>
    <head> </head>
    <body>

        <form  action="/test1" method="post">
            @csrf
            <h5>USER 1</h5>
            <label> enter latitude </label>
            <input type="text" name="latitude"/>
            <label> enter longitude </label>
            <input type="text" name="longitude"/>
            <input type="hidden" value="1" name="user"/>
            <input type="submit" name="submit_user1"/>

        </form>
        <form action="/test1" method="post">
            @csrf
            <h5>USER 2</h5>
            <label> enter latitude </label>
            <input type="text" name="latitude"/>
            <label> enter longitude </label>
            <input type="text" name="longitude"/>
            <input type="hidden" value="2" name="user"/>
            <input type="submit" name="submit_user2"/>
        </form>
        <form action="/test1" method="post">
            @csrf
            <h5>USER 3</h5>
            <label> enter latitude </label>
            <input type="text" name="latitude"/>
            <label> enter longitude </label>
            <input type="text" name="longitude"/>
            <input type="hidden" value="3" name="user"/>
            <input type="submit" name="submit_user3"/>
        </form>
        <form action="/test1" method="post">
            @csrf
            <h5>USER 4</h5>
            <label> enter latitude </label>
            <input type="text" name="latitude"/>
            <label> enter longitude </label>
            <input type="text" name="longitude"/>
            <input type="hidden" value="4" name="user"/>
            <input type="submit" name="submit_user4"/>
        </form>
      
    </body>
  
  
</html>