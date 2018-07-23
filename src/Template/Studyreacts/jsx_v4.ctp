<?php
echo $this->Html->script('https://unpkg.com/react@16/umd/react.development.js');
echo $this->Html->script('https://unpkg.com/react-dom@16/umd/react-dom.development.js');

//Don't use this in production
echo $this->Html->script('https://unpkg.com/babel-standalone@6.15.0/babel.min.js');
?>

<table>
                        
    <!-- TUT1 -->
    <tr>
        <td style="width: 100px;">TUT1-1</td>
        <td>
            <div id="tut1-1"></div>
            <script type="text/babel">
                var energyLevel = 100;
                
                function activateLasers()
                {
                    energyLevel -= 200;
                    alert("PEW PEW (" + energyLevel + ")");
                }
                
                //onclick example
                ReactDOM.render(
                    <button onClick={activateLasers}>Activate Lasers</button>,
                    document.getElementById('tut1-1')
                );
            </script>
        </td>
    </tr>
    <tr>
        <td>TUT1-2</td>
        <td>
            <div id="tut1-2"></div>
            <script type="text/babel">
                function reactorOnline( supplyPower)
                {
                    energyLevel += supplyPower;
                    //alert("Energy level " + energyLevel); //disable because annoying
                }
                
                //not to be confused with this, this will call the function after page load and no on-click event install
                ReactDOM.render(
                    <button onClick={reactorOnline(9000)}>Reactor online</button>,
                    document.getElementById('tut1-2')
                );
            </script>
        </td>
    </tr>
                        
    <!-- TUT2 -->
    <tr>
        <td style="width: 100px;">TUT1-1</td>
        <td>
            <div id="tut2-1"></div>
            <script type="text/babel">
                function handleClick(e) {
                    e.preventDefault();
                    alert("You click a LINK");
                }
                ReactDOM.render(
                    <a href="#" onClick={handleClick}>Click me</a>,
                    document.getElementById('tut2-1')
                );
            </script>
        </td>
    </tr>
    
    <tr>
        <td>TUT0</td>
        <td>
            <div id="tut0"></div>
            <script type="text/babel">
                
            </script>
        </td>
    </tr>
</table>


