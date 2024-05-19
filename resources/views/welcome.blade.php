<!DOCTYPE html>
<html >
    <head>
        <title>Exchange Rate</title>
    </head>
    <body>

    <div>
        <h1>Currency</h1>
        <select value={from} onChange={(e) => setFrom(e.target.value)}>
        <option value="USD">USD</option>
        <option value="AUD">AUD</option>
        <option value="EUR">EUR</option>
        <option value="GBP">GBP</option>
        <option value="CAD">CAD</option>
        <option value="UAH">UAH</option>
        </select>

        <input
            type="number"
            value={amount}
            onChange={(e) => setAmount(e.target.value)}
        placeholder="Enter amount"
        />

        <select value={to} onChange={(e) => setTo(e.target.value)}>
        <option value="USD">USD</option>
        <option value="AUD">AUD</option>
        <option value="EUR">EUR</option>
        <option value="GBP">GBP</option>
        <option value="CAD">CAD</option>
        <option value="UAH">UAH</option>
        </select>
        <button onClick={fetchResult}>Exchange</button>
        { message && <p>Currency: {message}</p> }
        { error && <p>Error: {error}</p> }
    </div>

    </body>
</html>
