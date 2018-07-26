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
        <td>TUT2-1</td>
        <td>
            <div id="tut2-1"></div>
            <script type="text/babel">
                function handleClick1(e) {
                    e.preventDefault(); //without this the link will be executed
                    alert("You click a LINK");
                }
                ReactDOM.render(
                    <a href="www.yahoo.com" onClick={handleClick1}>Click me</a>,
                    document.getElementById('tut2-1')
                );
            </script>
        </td>
    </tr>
    <tr>
        <td>TUT2-2</td>
        <td>
            <div id="tut2-2"></div>
            <script type="text/babel">
                function handleClick2(e) {
                    alert("You click a LINK");
                }
                ReactDOM.render(
                    <a href="http://www.yahoo.com" onClick={handleClick2}>Click me</a>,
                    document.getElementById('tut2-2')
                );
            </script>
        </td>
    </tr>
    
    <!-- TUT3 -->
    <tr>
        <td>TUT3-1</td>
        <td>
            <div id="tut3-1"></div>
            <script type="text/babel">
                //Toggle component renders a button that lets the user toggle between “ON” and “OFF” states
                class Toggle1 extends React.Component {
                    constructor(props) {
                        super(props);
                        this.state = {isToggleOn: true};

                        // This binding is necessary to make `this` work in the callback
                        this.handleClick = this.handleClick.bind(this);
                    }

                    handleClick() {
                        this.setState(prevState => ({
                            isToggleOn: !prevState.isToggleOn
                        }));
                    }

                    render() {
                        return (
                        <button onClick={this.handleClick}>{this.state.isToggleOn ? 'ON' : 'OFF'}</button>
                        );
                    }
                }
                ReactDOM.render(
                    <Toggle1 />,
                    document.getElementById('tut3-1')
                );
            </script>
        </td>
    </tr>
    <tr>
        <td>TUT3-2</td>
        <td>
            <div id="tut3-2"></div>
            <script type="text/babel">
                //Above example require binding, if dont want to use binding, below is 1 example
                class Toggle2 extends React.Component {
                    constructor(props) {
                        super(props);
                        this.state = {isToggleOn: true};
                    }

                    handleClick = () => {
                        this.setState(prevState => ({
                            isToggleOn: !prevState.isToggleOn
                        }));
                    }

                    render() {
                        return (
                        <button onClick={this.handleClick}>{this.state.isToggleOn ? 'ON' : 'OFF'}</button>
                        );
                    }
                }
                ReactDOM.render(
                    <Toggle2 />,
                    document.getElementById('tut3-2')
                );
            </script>
        </td>
    </tr>
    <tr>
        <td>TUT3-3</td>
        <td>
            <div id="tut3-3"></div>
            <script type="text/babel">
                //Another example, but not a good practice
                //We generally recommend binding in the constructor or using the class fields syntax, to avoid this sort of performance problem
                class Toggle3 extends React.Component {
                    constructor(props) {
                        super(props);
                        this.state = {isToggleOn: true};
                    }
                    
                    handleClick() {
                        this.setState(prevState => ({
                            isToggleOn: !prevState.isToggleOn
                        }));
                    }

                    render() {
                        return (
                        <button onClick={(e) => this.handleClick(e)}>{this.state.isToggleOn ? 'ON' : 'OFF'}</button>
                        );
                    }
                }
                ReactDOM.render(
                    <Toggle3 />,
                    document.getElementById('tut3-3')
                );
            </script>
        </td>
    </tr>
    
    <!-- TUT4: Passing Arguments to Event Handlers -->
    <tr>
        <td>TUT4-1</td>
        <td>
            <div id="tut4-1"></div>
            <script type="text/babel">
                //way1
                class Deletepost1 extends React.Component {
                    constructor(props) {
                        super(props);
                    }
                    
                    deleteRow(id) {
                        alert("ID to be deleted = " + id);
                    }

                    render() {
                        return (
                        <button onClick={(e) => this.deleteRow(this.props.id, e)}>DELETE IT</button>
                        );
                    }
                }
                ReactDOM.render(
                    <Deletepost1 id="123" />,
                    document.getElementById('tut4-1')
                );
            </script>
        </td>
    </tr>
    <tr>
        <td>TUT4-2</td>
        <td>
            <div id="tut4-2"></div>
            <script type="text/babel">
                //way2
                class Deletepost2 extends React.Component {
                    constructor(props) {
                        super(props);
                    }
                    
                    deleteRow(id) {
                        alert("ID to be deleted = " + id);
                    }

                    render() {
                        //TUT3-1 using bind on consturctor, this bind on the element
                        return (
                        <button onClick={this.deleteRow.bind(this, this.props.id)}>DELETE IT</button>
                        );
                    }
                }
                ReactDOM.render(
                    <Deletepost2 id="456" />,
                    document.getElementById('tut4-2')
                );
            </script>
        </td>
    </tr>
    
    <!-- 
    TUT5: Continue from jsx_v3.ctp TUT4
    State Updates are Merged, https://reactjs.org/docs/state-and-lifecycle.html#state-updates-are-merged
    -->
    <tr>
        <td>TUT5-1</td>
        <td>
            <div id="tut5-1"></div>
            <script type="text/babel">
                class Example1 extends React.Component {
                    constructor(props) {
                        super(props);
                        this.state = {
                            student: ['Adam'],
                            teacher: ['Sandy']
                        };
                    }
                    
                    componentDidMount() {
                        alert("Mounting");
                    }
                    
                    componentWillUnmount() {
                    }
                    
                    addStudent( name) {
                        alert("Currently: " + this.state.student.join(", ") + ". Now adding: " + name);
                        
                        this.setState(prevState => ({
                            student: prevState.student.concat([name])
                        }));
                    }
                    
                    render() {
                        return (
                        <button onClick={this.addStudent.bind(this, this.props.name)}>ADD STUDENT</button>
                        );
                    }
                }
                ReactDOM.render(
                    <Example1 name="Henry" />,
                    document.getElementById('tut5-1')
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


