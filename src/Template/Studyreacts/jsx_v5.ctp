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
                function UserGreeting1(props) {
                    return <h5>Welcome back!</h5>;
                }

                function GuestGreeting1(props) {
                    return <h5>Please sign up.</h5>;
                }
                
                function Greeting1(props) {
                    const isLoggedIn = props.isLoggedIn;
                    if (isLoggedIn) {
                        return <UserGreeting1 />;
                    }
                    return <GuestGreeting1 />;
                }
                
                ReactDOM.render(
                    <Greeting1 isLoggedIn={true} />,
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
                ReactDOM.render(
                    <Greeting1 isLoggedIn={false} />,
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
                function LoginButton1(props) {
                    return (
                      <button onClick={props.onClick}>
                        Login
                      </button>
                    );
                  } 
                
                function LogoutButton1(props) {
                    return (
                      <button onClick={props.onClick}>
                        Logout
                      </button>
                    );
                  }
                  
                class LoginControl1 extends React.Component {
                    constructor(props) {
                        super(props);
                        this.handleLoginClick = this.handleLoginClick.bind(this);
                        this.handleLogoutClick = this.handleLogoutClick.bind(this);
                        this.state = {isLoggedIn: false};
                      }

                      handleLoginClick() {
                        this.setState({isLoggedIn: true});
                      }

                      handleLogoutClick() {
                        this.setState({isLoggedIn: false});
                      }

                      render() {
                        const isLoggedIn = this.state.isLoggedIn;
                        let button;

                        if (isLoggedIn) {
                          button = <LogoutButton1 onClick={this.handleLogoutClick} />;
                        } else {
                          button = <LoginButton1 onClick={this.handleLoginClick} />
                        }

                        return (
                          <div>
                            <Greeting1 isLoggedIn={isLoggedIn} />
                            {button}
                          </div>
                        );
                      }
                }
                
                ReactDOM.render(
                    <LoginControl1 />,
                    document.getElementById('tut2-1')
                  );
            </script>
        </td>
    </tr>
                    
    <!-- TUT3: Using If-else AKA Logical Operator -->
    <tr>
        <td>TUT3-1</td>
        <td>
            <div id="tut3-1"></div>
            <script type="text/babel">
                function Mailbox(props) {
                    const unreadMessages = props.unreadMessages;
                    return (
                      <div>
                        <h5>Hello!</h5>
                        {unreadMessages.length > 0 &&
                          <p>
                            You have {unreadMessages.length} unread messages.
                          </p>
                        }
                      </div>
                    );
                  }

                  const messages = ['React', 'Re: React', 'Re:Re: React'];
                  ReactDOM.render(
                    <Mailbox unreadMessages={messages} />,
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
                class LoginControl2 extends React.Component {
                    constructor(props) {
                        super(props);
                        //this.state = {isLoggedIn: false};
                        this.state = {isLoggedIn: this.props.isLoggedIn}; //passing data from render
                      }
                    
                    render() {
                        const isLoggedIn = this.state.isLoggedIn;
                        return (
                          <div>
                            The user is <b>{isLoggedIn ? 'currently' : 'not'}</b> logged in.
                          </div>
                        );
                      }
                }
                ReactDOM.render(
                    <LoginControl2 isLoggedIn={true} />,
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
                ReactDOM.render(
                    <LoginControl2 isLoggedIn={false} />,
                    document.getElementById('tut3-3')
                  );
            </script>
        </td>
    </tr>
    <tr>
        <td>TUT3-4</td>
        <td>
            <div id="tut3-4"></div>
            <script type="text/babel">
                class LoginControl3 extends React.Component {
                    constructor(props) {
                        super(props);
                        this.state = {isLoggedIn: this.props.isLoggedIn};
                      }
                    
                    render() {
                        const isLoggedIn = this.state.isLoggedIn;
                        return (
                          <div>
                          {isLoggedIn ? (
                            <LogoutButton1 onClick={this.handleLogoutClick} />
                          ) : (
                            <LoginButton1 onClick={this.handleLoginClick} />
                          )}
                          </div>
                        );
                      }
                }
                ReactDOM.render(
                    <LoginControl3 isLoggedIn={true} />,
                    document.getElementById('tut3-4')
                  );
            </script>
        </td>
    </tr>
    <tr>
        <td>TUT3-5</td>
        <td>
            <div id="tut3-5"></div>
            <script type="text/babel">  
                ReactDOM.render(
                    <LoginControl3 isLoggedIn={false} />,
                    document.getElementById('tut3-5')
                  );
            </script>
        </td>
    </tr>
    
    <tr>
        <td>TUT4-1</td>
        <td>
            <div id="tut4-1"></div>
            <script type="text/babel">
                //Preventing Component from Rendering
                
                function WarningBanner(props) {
                    if (!props.warn) {
                      return null;
                    }

                    return (
                      <div className="warning">
                        Warning!
                      </div>
                    );
                  }
                  
                class ShowWarning1 extends React.Component {
                    constructor(props) {
                      super(props);
                      this.state = {showWarning: true};
                      this.handleToggleClick = this.handleToggleClick.bind(this);
                    }

                    handleToggleClick() {
                      this.setState(prevState => ({
                        showWarning: !prevState.showWarning
                      }));
                    }

                    render() {
                      return (
                        <div>
                          <WarningBanner warn={this.state.showWarning} />
                          <button onClick={this.handleToggleClick}>
                            {this.state.showWarning ? 'Hide' : 'Show'}
                          </button>
                        </div>
                      );
                    }
                  }

                ReactDOM.render(
                    <ShowWarning1 isLoggedIn={false} />,
                    document.getElementById('tut4-1')
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


