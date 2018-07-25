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
                
                //Loop V1
                function Multiply2(props) {
                    const numbers = props.numberInput;
                    const doubled = numbers.map((number) => number * 2);
                    //console.log(doubled);
                    
                    return <div>{doubled.join(', ')}</div>;
                }
                
                ReactDOM.render(
                    <Multiply2 numberInput={[1, 2, 3, 4, 5]} />,
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
                
                //Loop V2
                const listItems = ([11, 22, 33, 44, 55]).map((number, key) => <li key={key}>{number}</li>);
                
                ReactDOM.render(
                    <ul>{listItems}</ul>,
                    document.getElementById('tut1-2')
                );
            </script>
        </td>
    </tr>
    <tr>
        <td>TUT1-3</td>
        <td>
            <div id="tut1-3"></div>
            <script type="text/babel">
                
                function NumberList1(props) {
                    const numbers = props.numbers;
                    const listItems = numbers.map((number) =>
                      <li key={number.toString()}>
                        {number}
                      </li>
                    );
                    return (
                      <ul>{listItems}</ul>
                    );
                  }
                
                const numbers = [1, 2, 3, 4, 5];
                ReactDOM.render(
                    <NumberList1 numbers={numbers}/>,
                    document.getElementById('tut1-3')
                );
            </script>
        </td>
    </tr>
                    
    <!--TUT2-->
    <tr>
        <td>TUT2</td>
        <td>
            <div id="tut2">Have to read the theory yourself https://reactjs.org/docs/lists-and-keys.html#keys and https://reactjs.org/docs/lists-and-keys.html#extracting-components-with-keys</div>
        </td>
    </tr>
    
    <!--TUT3: Embedding map() in JSX-->
    <tr>
        <td>TUT3-1</td>
        <td>
            <div id="tut3-1"></div>
            <script type="text/babel">
                
                function ListItem(props) {
                    // Correct! There is no need to specify the key here:
                    return <li>{props.value}</li>;
                  }
                
                function NumberList2(props) {
                    const numbers = props.numbers;
                    const listItems = numbers.map((number) =>
                      <ListItem key={number.toString()}
                                value={number} />

                    );
                    return (
                      <ul>
                        {listItems}
                      </ul>
                    );
                  }
                  
                ReactDOM.render(
                    <NumberList2 numbers={[55, 44, 33, 22, 11]}/>,
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
                
                function NumberList3(props) {
                    const numbers = props.numbers;
                    return (
                      <ul>
                        {numbers.map((number) =>
                          <ListItem key={number.toString()}
                                    value={number} />

                        )}
                      </ul>
                    );
                  }
                  
                ReactDOM.render(
                    <NumberList3 numbers={[22, 44, 66, 88]}/>,
                    document.getElementById('tut3-2')
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


