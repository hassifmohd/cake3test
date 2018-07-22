<?php
echo $this->Html->script('https://unpkg.com/react@16/umd/react.development.js');
echo $this->Html->script('https://unpkg.com/react-dom@16/umd/react-dom.development.js');

//Don't use this in production
echo $this->Html->script('https://unpkg.com/babel-standalone@6.15.0/babel.min.js');
?>

<div id="root"></div>

<script type="text/babel">
    
    //render hello world into div with id=root
    ReactDOM.render(
        <h1>Hello, world!</h1>,
        document.getElementById('root')
    );
</script>
