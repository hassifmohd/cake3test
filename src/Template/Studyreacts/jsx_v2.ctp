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
    <tr>
        <td>TUT3-1</td>
        <td><div id="tut3-1"></div></td>
    </tr>
    <tr>
        <td>TUT3-2</td>
        <td><div id="tut3-2"></div></td>
    </tr>
    <tr>
        <td>TUT3-3</td>
        <td><div id="tut3-3"></div></td>
    </tr>
    <tr>
        <td>TUT3-4</td>
        <td><div id="tut3-4"></div></td>
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
    function Appwithvariable(props) {
        
        //TUT2-3-A: this works
        //return <ul>{props.data.map((student, i) => <li key={i}>{student.name}</li>)}</ul>
        
        //TUT2-3-B: but i want the output to use welcome React.components
        //notice that we dont need to encapsulate it with {} like example TUT2-3-A
        return props.data.map((student, i) => <Welcome key={i} name={student.name} />)
    }
    
    //i have try so many way, it seems encapsulate main data into another cariable called 'data' is the only way to make this works
    ReactDOM.render(
        React.createElement(Appwithvariable, { data: [
            {name: 'Alice'}, {name: 'Sara'}
        ]}),
        document.getElementById('tut2-3')
    );
    
    //TUT3: Extracting Components
    //https://reactjs.org/docs/components-and-props.html#extracting-components
    function Comment1(props) {
        return (
            <div className="Comment">
                <div className="UserInfo">
                    <img width="100px" className="Avatar"
                    src={props.avatarUrl}
                    alt={props.avatarName}
                    />
                    <div className="UserInfo-name">{props.name}</div>
                </div>
                <div className="Comment-text">
                    {props.text}
                </div>
                <div className="Comment-date">{props.date}</div>
            </div>
        );
    }
    
    //as tutorial
    ReactDOM.render(
        <Comment1 avatarUrl='http://creativeedtech.weebly.com/uploads/4/1/6/3/41634549/published/avatar.png?1487742111' text='PM best price' avatarName='creativeedtech' name='Rob' date='2018-01-01'/>,
        document.getElementById('tut3-1')
    );
    
    //slightly different approach, using React.createElement(...)
    ReactDOM.render(
        React.createElement(Comment1, {
            avatarUrl: 'http://creativeedtech.weebly.com/uploads/4/1/6/3/41634549/published/avatar.png?1487742111',
            avatarName: 'creativeedtech',
            text: 'Hello world',
            name: 'Joe',
            date: '2018-02-15'
        }), 
        document.getElementById('tut3-2')
    );
    
    //split the Comment1 into more reusable function
    function Avatar1(props) {
        return <img width="100px" className="Avatar" src={props.user.avatarUrl} alt={props.user.avatarName}/>
    }
    function UserInfo1(props) {
        return <div className="UserInfo">
            <Avatar1 user={props.user} />
            <div className="UserInfo-name">{props.user.name}</div>
        </div>
    }
    function Comment2(props) {
        
        return (
            <div className="Comment">
                <UserInfo1 user={props.data.user} />
                <div className="Comment-text">{props.data.text}</div>
                <div className="Comment-date">{props.data.date}</div>
            </div>
        );
    }
    
    //render into tut3-3
    //this is a different approach from "as tutorial" because it encapsulate all data into one variable
    //but got weakness, see tut3-4 example
    var data1 = {
        user : {
            avatarUrl: 'http://creativeedtech.weebly.com/uploads/4/1/6/3/41634549/published/avatar.png?1487742111',
            avatarName: 'creativeedtech',
            name: 'Adam'
        },
        date: '2018-03-03',
        text: 'So cool'
    };
    ReactDOM.render(
        <Comment2 data={data1} />,
        document.getElementById('tut3-3')
    );
    
    //render into tut3-4 with slight different approach
    //since we take use "Comment2 data=" approach, we had to encapsulate the whole data again with data:{_actual data goes here_}
    ReactDOM.render(
        React.createElement(Comment2, { data: {
            user : {
                avatarUrl: 'http://creativeedtech.weebly.com/uploads/4/1/6/3/41634549/published/avatar.png?1487742111',
                avatarName: 'creativeedtech',
                name: 'James'
            },
            date: '2018-04-10',
            text: 'Plausible'
        }}),
        document.getElementById('tut3-4')
    );
</script>