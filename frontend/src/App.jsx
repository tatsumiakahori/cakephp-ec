import { useEffect, useState } from 'react'
import './App.css'

function App() {
  const [users, setUsers] = useState([])

  useEffect(() => {
    // CakePHPのAPIからデータを取得
    fetch('http://localhost:8080/users.json')
      .then(response => response.json())
      .then(data => {
        setUsers(data.users)
      })
      .catch(error => console.error('通信エラー:', error))
  }, [])

  return (
    <div style={{ padding: '20px' }}>
      <h1>ユーザー一覧</h1>
      <table border="1" style={{ width: '100%', borderCollapse: 'collapse' }}>
        <thead>
          <tr>
            <th>ID</th>
            <th>Email</th>
            <th>作成日</th>
          </tr>
        </thead>
        <tbody>
          {users.map(user => (
            <tr key={user.id}>
              <td>{user.id}</td>
              <td>{user.email}</td>
              <td>{new Date(user.created).toLocaleString()}</td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  )
}

export default App
