<?php
echo $this->Html->script('https://unpkg.com/react@16/umd/react.development.js');
echo $this->Html->script('https://unpkg.com/react-dom@16/umd/react-dom.development.js');

//Don't use this in production
echo $this->Html->script('https://unpkg.com/babel-standalone@6.15.0/babel.min.js');
?>

<table>
    <tr>
        <td style="width: 100px;">TUT1-1</td>
        <td><div id="tut1-1"></div></td>
    </tr>
    <tr>
        <td>TUT1-2</td>
        <td><div id="tut1-2"></div></td>
    </tr>
    <tr>
        <td>TUT2-1</td>
        <td><div id="tut2-1"></div></td>
    </tr>
    <tr>
        <td>TUT2-2</td>
        <td><div id="tut2-2"></div></td>
    </tr>
    <tr>
        <td>TUT3-1</td>
        <td><div id="tut3-1"></div></td>
    </tr>
    <tr>
        <td>TUT3-2</td>
        <td><div id="tut3-2"></div></td>
    </tr>
    <tr>
        <td>TUT4-1</td>
        <td><div id="tut4-1"></div></td>
    </tr>
    <tr>
        <td>TUT4-2</td>
        <td><div id="tut4-2"></div></td>
    </tr>
    <tr>
        <td>TUT5</td>
        <td><div id="tut5"></div></td>
    </tr>
    <tr>
        <td>TUT6</td>
        <td><div id="tut6"></div></td>
    </tr>
</table>

<script type="text/babel">
    
    //TUT1
    const name = 'Josh Perez';
    const element1 = <h5>Hello, {name}</h5>;

    //as per tutorial
    ReactDOM.render(
        element1,
        document.getElementById('tut1-1')
    );

    //why we need to declare element1 as constant?
    ReactDOM.render(
        <h5>Hello, {name}</h5>,
        document.getElementById('tut1-2')
    );
    
    //TUT2
    function formatName(user) {
        return user.firstName + ' ' + user.lastName;
    }
    
    const user1 = {
        firstName: 'Harper',
        lastName: 'Perez'
    };
    
    const element2 = (
        <h5>Hello, {formatName(user1)}!</h5>
    );

    //as per tutorial
    ReactDOM.render(
        element2,
        document.getElementById('tut2-1')
    );

    //without using element2 as constant
    ReactDOM.render(
        <h5>Hello, {formatName(user1)}!</h5>,
        document.getElementById('tut2-2')
    );
    
    //TUT3
    function getGreeting(user) {
        if (user) {
            return <h5>Hello, {formatName(user)}!</h5>;
        }
        
        return <h5>Hello, Stranger.</h5>;
    }

    //we can also pass the paremeters like below
    ReactDOM.render(
        getGreeting({firstName: 'Roberto', lastName: 'Carlos'}),
        document.getElementById('tut3-1')
    );

    ReactDOM.render(
        getGreeting(null),
        document.getElementById('tut3-2')
    );
    
    //TUT4: Specifying Attributes with JSX, https://reactjs.org/docs/introducing-jsx.html#specifying-attributes-with-jsx
    //can use quotes to specify string literals as attributes
    const element3 = <div tabIndex="0">HOW ARE YOU</div>;

    ReactDOM.render(
        element3,
        document.getElementById('tut4-1')
    );

    //using curly backet
    const user2 = {
        firstName: 'Harper',
        lastName: 'Perez',
        avatarUrl: 'http://creativeedtech.weebly.com/uploads/4/1/6/3/41634549/published/avatar.png?1487742111',
    };
    
    //we dont put quotes to wrap the curly backet like "{user2.avatarUrl}"
    //because quotes will take literal value, so when render we will get src={user2.avatarUrl}
    //if there is no content inside <img> we can close it early using /
    const element4 = <img width="100px" src={user2.avatarUrl}/>;

    ReactDOM.render(
        element4,
        document.getElementById('tut4-2')
    );
    
    //TUT5: Specifying Children with JSX
    //https://reactjs.org/docs/introducing-jsx.html#specifying-children-with-jsx
    ReactDOM.render(
        <div>
            <h5>Hello!</h5>
            <p>Good to see you here.</p>
        </div>,
        document.getElementById('tut5')
    );
    
    //TUT6: Updating the Rendered Element
    //https://reactjs.org/docs/rendering-elements.html#updating-the-rendered-element
    function tick() {
        ReactDOM.render(<p>Time is {new Date().toLocaleTimeString()}, you ready?</p>, document.getElementById('tut6'));
    }
    setInterval(tick, 1000);
</script>