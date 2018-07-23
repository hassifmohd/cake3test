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
        <td>TUT2-3</td>
        <td><div id="tut2-3"></div></td>
    </tr>
</table>

<script type="text/babel">
    
    //TUT1
    class Welcome extends React.Component {
        render() {
            return <h5>Hello, {this.props.name}</h5>;
        }
    }
    
    //as per tutorial
    ReactDOM.render(
        <Welcome name='Sara' />,
        document.getElementById('tut1-1')
    );
    
    //learn from onweb.ctp
    ReactDOM.render(
        React.createElement(Welcome, { name: 'Chad' }), 
        document.getElementById('tut1-2')
    );
    
    //TUT2: Composing Components
    //https://reactjs.org/docs/components-and-props.html#composing-components
    
    //TUT2-1: as per tutorial
    function App() {
        return (
            <div>
                <Welcome name="Sara" />
                <Welcome name="Cahal" />
                <Welcome name="Edite" />
            </div>
        );
    }
    
    ReactDOM.render(
        <App />,
        document.getElementById('tut2-1')
    );
    
    //TUT2-2: do a loop
    class Loopy extends React.Component {
        render() {
            //key is important, else will get warning error
            return <ul>
                {['Sara', 'Alice'].map((name, i) => <li key={i}>{i} = {name}</li>)}
            </ul>
        }
    }
    ReactDOM.render(
        <Loopy />,
        document.getElementById('tut2-2')
    );

    //TUT2-3: calling with variable
    function Appwithvariable(students) {
        
        /*return (
            <div>
                <Welcome name={students[0].name} />
                <Welcome name={students[1].name} />
            </div>
        
            
            {students.map((name, i) => <li key={i}>{i} = {name}</li>)}
        );*/

        return <ul>
            {[{name: 'Alice'}, {name: 'Chad'}].map((name, i) => <li key={i}>qwe</li>)}
        </ul>
    }
    
    ReactDOM.render(
        React.createElement(Appwithvariable, [{name: 'Alice'}, {name: 'Chad'}]),
        document.getElementById('tut2-3')
    );
    
    //TUT3
</script>