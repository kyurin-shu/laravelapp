module.exports = {
    "roots": [
        "<rootDir>/resources/js"
    ],
    "transform": {
        '^.+\\.js$': '<rootDir>/node_modules/babel-jest',
        "^.+\\.(vue)$": "vue-jest"
    },
    "testEnvironment": "jsdom"
}