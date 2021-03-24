import 'bootstrap/dist/css/bootstrap.min.css';
import {
  Container,
  Navbar, Nav, NavDropdown,
} from 'react-bootstrap';
import {
  HashRouter as Router,
  Switch,
  Route,
  Link
} from "react-router-dom";

import background from "./img/BG1.png";
import Request from './Request'
import Report from './Report'

function App() {
  return (
    <div style={{ backgroundImage: `url(${background})` }}>
      <Router>
        <Navbar collapseOnSelect expand="lg" bg="dark" variant="dark">
          <Navbar.Brand><Link to="/home">SMV Parking Request</Link></Navbar.Brand>
          <Navbar.Toggle aria-controls="responsive-navbar-nav" />
          <Navbar.Collapse id="responsive-navbar-nav">
            <Nav className="mr-auto">
              <Nav.Link>
                <Link to="/Request">Request</Link>
              </Nav.Link>
              <Nav.Link>
                <Link to="/Report">Report</Link>
              </Nav.Link>
            </Nav>
          </Navbar.Collapse>
        </Navbar>

        <Switch>
          <Route path="/Request">
            <Request />
          </Route>
          <Route path="/Report">
            <Report />
          </Route>
          <Route path="/home">
            <Home />
          </Route>
        </Switch>
      </Router><br></br>
    </div>
  );
}

function Home() {
  return (
    <h1>Welcome to SMV Parking Request system</h1>
  )
}
export default App;
