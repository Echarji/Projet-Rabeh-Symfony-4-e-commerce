pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Increment Version') {
            steps {
                script {
                    def versionFile = 'version.txt'
                    def currentVersion = readFile(versionFile).trim()
                    def newVersion = currentVersion.split('\\.').collect { it.toInteger() }
                    newVersion[2]++
                    newVersion = newVersion.join('.')
                    writeFile file: versionFile, text: newVersion
                    env.IMAGE_VERSION = newVersion // Store the version for later use
                }
            }
        }

        
    }

   
}
