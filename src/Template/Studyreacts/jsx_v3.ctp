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
                //default example
                function tick1() {
                    const element = (
                        <div>
                            <h5>Hello, world!</h5>
                            <p>Now is {new Date().toLocaleTimeString()} o-clock</p>
                        </div>);
                
                        ReactDOM.render(element, document.getElementById('tut1-1'));
                }
                setInterval(tick1, 1000);
            </script>
        </td>
    </tr>
    <tr>
        <td>TUT1-2</td>
        <td>
            <div id="tut1-2"></div>
            <script type="text/babel">
                //make it slightly reusable
                //below is no component, just a class
                //next TUT2 is "using state + component" to make same clock
                function Clock1(props) {
                    return (
                        <div>
                            <h5>Clock1</h5>
                            <p>Now is {props.date.toLocaleTimeString()} o-clock</p>
                        </div>
                    );
                }
                
                function tick2() {
                    ReactDOM.render(
                        <Clock1 date={new Date()} />,
                        document.getElementById('tut1-2')
                    );
                }
                
                setInterval(tick2, 1000);
            </script>
        </td>
    </tr>
                        
    <!-- TUT2 -->
    <tr>
        <td>TUT2-1</td>
        <td>
            <div id="tut2-1"></div>
            <script type="text/babel">
                //make clock component
                //https://reactjs.org/docs/state-and-lifecycle.html#converting-a-function-to-a-class
                
                //as per tutorial, initially. without state
                class Clock2 extends React.Component {
                    render() {
                        return (
                            <div>
                                <h5>Clock2</h5>
                                <p>Now is {this.props.date.toLocaleTimeString()} o-clock</p>
                            </div>
                        );
                    }
                }
                
                function tick4() {
                    ReactDOM.render(
                        <Clock2 date={new Date()} />,
                        document.getElementById('tut2-1')
                    );
                }
                
                setInterval(tick4, 1000);
            </script>
        </td>
    </tr>
    <tr>
        <td>TUT2-2</td>
        <td>
            <div id="tut2-2"></div>
            <script type="text/babel">
                //using component and state
                class Clock3 extends React.Component {
                    constructor(props) {
                        super(props);
                        
                        //this will be executed once
                        this.state = {date: new Date()};
                    }
  
                    render() {
                        //this will be executed every seconds
                        this.state = {date: new Date()};
                        
                        return (
                            <div>
                                <h5>Clock3</h5>
                                <p>Now is {this.state.date.toLocaleTimeString()} o-clock</p>
                            </div>
                        );
                    }
                }
                function tick3() {
                    ReactDOM.render(
                        <Clock3 />,
                        document.getElementById('tut2-2')
                    );
                }
        
                setInterval(tick3, 1000);
            </script>
        </td>
    </tr>
    
    <!-- TUT3 -->
    <tr>
        <td>TUT3-1</td>
        <td>
            <div id="tut3-1"></div>
            <script type="text/babel">
                //using component + state + mounting
                class Clock4 extends React.Component {
                    constructor(props) {
                        super(props);
                        
                        //this will be executed once
                        //"this.state" only in constructor, the rest use "this.setState(...)"
                        //Please read https://reactjs.org/docs/state-and-lifecycle.html#using-state-correctly
                        this.state = {
                            date: new Date(),
                            counter1: 1,
                            counter2: 1
                        };
                    }
                    
                    //The componentDidMount() hook runs after the component output has been rendered to the DOM
                    //This is a good place to set up a timer:
                    componentDidMount() {
                        this.timerID = setInterval(
                            () => this.tickTockKesha(), 1000
                        );
                    }

                    //We will tear down the timer in the componentWillUnmount() lifecycle hook
                    componentWillUnmount() {
                        clearInterval(this.timerID);
                    }
                    
                    tickTockKesha() {
                        //update the time
                        this.setState({date: new Date()});
                        
                        //update the counter
                        //we cannot simply use like this this.setState({counter: this.state.counter + 1});
                        this.setState(function(prevState, props) {
                            return {
                              counter1: prevState.counter1 + 1
                            };
                        });
                        
                        //additional way of adding counter
                        this.setState((prevState, props) => ({
                            counter2: prevState.counter2 + 1
                        }));
                    }
  
                    render() {
                        return (
                            <div>
                                <h5>Clock4</h5>
                                <p>Now is {this.state.date.toLocaleTimeString()} o-clock</p>
                                <p>Counter1 is {this.state.counter1}</p>
                                <p>Counter2 is {this.state.counter2}</p>
                            </div>
                        );
                    }
                }
                ReactDOM.render(
                    <Clock4 />,
                    document.getElementById('tut3-1')
                );
            </script>
        </td>
    </tr>
    
    <!-- TUT4 -->
    <tr>
        <td>TUT4-1</td>
        <td>
            <div id="tut4-1"></div>
            <script type="text/babel">
                //TUT4-1
                //State Updates are Merged
                //https://reactjs.org/docs/state-and-lifecycle.html#state-updates-are-merged
                //They dont give code example
                
                class Example1 extends React.Component {
                    constructor(props) {
                        super(props);
                        this.state = {
                            student: [],
                            teacher: [],
                            liked: false,
                        };
                    }
                    componentDidMount() {
                    }
                    componentWillUnmount() {
                    }
                    render() {
                        return (
                            <div></div>
                        );
                    }
                }
                ReactDOM.render(
                    <Example1 />,
                    document.getElementById('tut4-1')
                );
        
                //TUT4-2
                //Data flow
                //https://reactjs.org/docs/state-and-lifecycle.html#the-data-flows-down
                //They dont give code example
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


