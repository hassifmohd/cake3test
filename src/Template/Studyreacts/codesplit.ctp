<?php
echo $this->Html->script('https://unpkg.com/react@16/umd/react.development.js');
echo $this->Html->script('https://unpkg.com/react-dom@16/umd/react-dom.development.js');
echo $this->Html->script('https://unpkg.com/babel-standalone@6.15.0/babel.min.js');
?>

<table>
    <tr>
        <td style="width: 100px;">TUT1-1</td>
        <td><div id="tut1-1"></div></td>
    </tr>
</table>

<script type="text/babel">

    ReactDOM.render(
        <h5>Hello world</h5>,
        document.getElementById('tut1-1')
    );
</script>
